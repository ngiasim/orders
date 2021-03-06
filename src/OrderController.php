<?php

namespace Ngiasim\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Country;
use App\Models\Product_description;
use App\Models\Language;
use App\Helpers\Helpers;
use App\Models\Product_status;
use App\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderStatus;
use App\Models\ProductOption;
use App\Models\ProductAttribute;
use App\Models\ProductOptionValue;
use App\Models\InventoryItem;
use App\Models\OrderComment;
use App\Models\InventoryItemDetail;
use App\Models\Currency;
use App\Models\Address;
use App\Models\Warehouse;
use App\Models\Shipment;
use App\Models\LogShipmentStatus;
use App\Models\LogOrderStatus;
use App\Models\CancelReason;
use DB;
use Config;

class OrderController extends Controller
{

  public function phoneOrder()
  {
       //dd(\Session::all());

       $cartItems = Cart::content();
       $total = Cart::total('2','.','');
       $total_tax = Cart::tax('2','.','');
       $customer_id = \Session::get('customer_id');
       $customers =  User::where('users_id', '=', $customer_id)->get();
       $curr_reg_country_numm = [];
       $curr_num = [];
       $checkout_currency_symbol_right = "";
       if (count($customers) > 0)
       {
         $pre_selected_region_country = \Session::get('region_country');
         $pre_selected_checkout_currency = \Session::get('checkout_currency');
         $curr_reg_country_numm = Country::where('country_id', '=', $pre_selected_region_country)->get();
         $curr_num = Currency::where('currency_id', '=', $pre_selected_checkout_currency)->get();
         $checkout_currency_symbol_right = $curr_num[0]->symbol_right;

       }




       $currencies = Currency::pluck('code', 'currency_id');
       $countries = Country::pluck('name', 'country_id');


       //dd($currencies);
       return view('orders::index', compact('checkout_currency_symbol_right','curr_num','curr_reg_country_numm','cartItems','total','total_tax','customer_id','customers','currencies','countries'));
  }

  public function getProductsByProductId($id)
  {
    $products =  Product::where('product_id', '=', $id)
    ->orWhere('meta_keywords','like','%'.$id.'%')
    ->with('productsDescription')
    ->with('ProductAttribute')
    ->limit(10)->get();

    foreach ($products as $p ) {

      foreach ($p->ProductAttribute as $o ) {
        $productOptionObj = ProductOption::find($o->fk_product_option);

        $product_options[$p->products_sku][] = $productOptionObj->display_name;
      }
    }

     foreach ($products as $option ) {
      $products_attributes =   Product::join('map_product_inventory_item as mpii','mpii.fk_product','product_id')
      ->join('inventory_item as ii','mpii.fk_inventory_item','ii.inventory_id')
      ->join('inventory_item_detail as iid','ii.inventory_id','iid.fk_inventory_item')
      ->join('product_option as po','po.product_option_id','iid.fk_product_option')
      ->join('product_option_value as pov','iid.fk_product_option_values', 'pov.product_option_value_id')
      ->where('product_id','=',$option->product_id)
      ->select('inventory_id','products_sku','inventory_code','product_option_id','po.name as option_name','pov.name',
       DB::Raw('(qty_onhand-qty_reserved-qty_admin_reserved)+qty_preorder as qty'),'ii.inventory_price','ii.inventory_price_prefix','base_price')
       ->get();

      $region_country = \Session::get('region_country');
 			$checkout_currency = \Session::get('checkout_currency');

      if ($region_country=="")
          $region_country = 233;

      if ($checkout_currency=="")
          $checkout_currency = 57;

 			$reg_currency_data = Country::where('country_id', '=', $region_country)->get();
 			$checout_currency_data = Currency::where('currency_id', '=', $checkout_currency)->get();

      $objCurrency = new Currency();

        $json_cook_atributes_product ;
        $cook_atributes_product ;
        foreach ($products_attributes as $pa ) {
          //echo $pa->qty."<br>";
          if ($pa->qty > 0){
          //$cook_atributes_product[$option->products_sku][$option->name]
              foreach ($option->ProductAttribute as $inneratribute ) {
                  if($pa->product_option_id == $inneratribute->fk_product_option){
                       $cook_atributes_product[$pa->products_sku][$pa->option_name][]=$pa->name;
                  }
              }
              $cook_atributes_product[$pa->products_sku][$pa->option_name] = array_unique($cook_atributes_product[$pa->products_sku][$pa->option_name]);
              $json_cook_atributes_product[$pa->products_sku][$pa->inventory_code]["options"][$pa->option_name]=$pa->name;
              $json_cook_atributes_product[$pa->products_sku][$pa->inventory_code]["inventory_id"] = $pa->inventory_id;
              //dd($objCurrency->Conversion(1, $checout_currency_data[0]->conversion_rate, $pa->inventory_price));
              $json_cook_atributes_product[$pa->products_sku][$pa->inventory_code]["inventory_price"] = $objCurrency->Conversion(1, $checout_currency_data[0]->conversion_rate, $pa->inventory_price); //$pa->inventory_price;
              $json_cook_atributes_product[$pa->products_sku][$pa->inventory_code]["inventory_price_prefix"] = $pa->inventory_price_prefix;
              $json_cook_atributes_product[$pa->products_sku][$pa->inventory_code]["checkout_currency_symbol_left"] = $checout_currency_data[0]->symbol_left;
              $json_cook_atributes_product[$pa->products_sku][$pa->inventory_code]["checkout_currency_symbol_right"] = $checout_currency_data[0]->symbol_right;
              $json_cook_atributes_product[$pa->products_sku][$pa->inventory_code]["product_price"] = $objCurrency->Conversion(1, $checout_currency_data[0]->conversion_rate, $pa->base_price); // $pa->base_price;
           }
        }

     }
     
    $productView = \View::make('orders::productlisting', array("products"=>$products,"cook_atributes_product"=>$cook_atributes_product,"json_cook_atributes_product"=>json_encode($json_cook_atributes_product),"product_options"=>$product_options))->render();
    if (request()->getHost() == "store.femi9.local")
    {
      return $productView;
    }else{
      $data = array(
          "productView" => $productView
      );
      return $this->generateSuccessResponse($data);
    }
  }

  public function getCustomersByCustomerId($id)
  {
    $customers =  User::where('users_id', '=', $id)->orWhere('email','like','%'.$id.'%')->where('users_type', '=', 'c')->get();
    $customerView = \View::make('orders::customerlisting', array("customers"=>$customers))->render();
    $data = array(
        "customerView" => $customerView
    );
    return $this->generateSuccessResponse($data);
  }

  public function checkout(Request $request)
  {
        $input = $request->all();
        $sessionDetail  = session()->all();


        //Retriieve cart information
        $cartItems = Cart::content();
        $total = Cart::total('2','.','') - Cart::tax('2','.','');
        $customer_id = \Session::get('customer_id');
        $region_country = \Session::get('region_country');
   			$checkout_currency = \Session::get('checkout_currency');

   			$reg_currency_data = Country::where('country_id', '=', $region_country)->get();
   			$checout_currency_data = Currency::where('currency_id', '=', $checkout_currency)->get();

        // if(
        //     Auth::user()->charge($total*100, [
        //     'source' => $token,
        //     'receipt_email' => Auth::user()->email,
        // ])){

            $order = new Order();
            $order->fk_order_status= 1;
            $order->fk_customer= $customer_id;
            $order->payment_method= "COD";
            $order->shipping_method= "FEDEX";
            $order->shipping_amount= 0;
            $order->shipping_tax= 0;
            $order->tax= Cart::tax('2','.','');
            $order->order_total= $total;
            $order->fk_order_status= 1;
            $order->order_final_total= Cart::total('2','.','');
            $order->orders_source= $input['source'];
            $order->checkout_currency_code= $input['checkout_currency_code'];
            $order->checkout_currency_rate= 1.0;
            $order->fk_address_shipping= 1;
            $order->fk_address_billing= 2;
            $order->save();

            foreach($cartItems as $item){
                $orderItem = new OrderItem();
                $orderItem->fk_order=$order->order_id;
                $orderItem->fk_product=$item->id;
                $orderItem->products_name=$item->name;
                $orderItem->fk_product_status=$item->options->fk_product_status;
                $orderItem->inventory_code=$item->options->invsku;
                $orderItem->fk_inventory=$item->options->invId;
                $orderItem->products_price=$item->options->base_price;
                $orderItem->price=$item->price;
                $orderItem->ordered_quantity=$item->qty;
                $orderItem->peritem_tax= ($item->price*($item->taxRate/100))*$item->qty; // $item->id;
                $orderItem->fk_warehouse = 0;
                $orderItem->save();
                Cart::remove($item->rowId);
              }

              $user = User::find($customer_id);
              $user->orders_count= $user->orders_count + 1;
              $user->save();

          //return redirect('/order/'.$order->order_id);
        //
        // }else{
        //     return redirect('/cart');
        // }

        $data = array(
  	        "order_id" => $order->order_id
  	    );
        return $this->generateSuccessResponse($data);

    }

    public function index(Request $request){

    	$input = $request->all();
        /* $input = $request->all();
         $order = new Order();
         $filter = Array();
        //  if ($input['customer_id'])
        //  {
        //    $filter['customer_id'] = $input['customer_id'];
        //  }
         //dd($input['customer_id']);
         $orders = $order->getOrdersByFilters($input);
        //$orders = Order::all();

        return view('orders::listview',['orders'=>$orders]);*/


        $statuses = OrderStatus::pluck('status_name','order_status_id')->toArray();
        return view('orders::listview',['order_statuses'=>$statuses,'inputData'=>$input]);

    }
    public function getOrders (Request $request)
    {
    	$input = $request->all();
    	$order = new Order();
    	$orders = $order->getOrdersByFilters($input);
    	$response = $this->makeDatatable($orders);
    	return  $response;
    }
    public function makeDatatable($data)
    {
    	return \DataTables::of($data)
    	->addColumn('id', function ($order) {
    		$return = '<td><a href="/order/'.$order->order_id.'">'.$order->order_id.'</a></td>';
    		return $return;
    	})
    	->addColumn('order_source', function ($order) {
    		$return = "";
    		if($order->orders_source == "p")
    		{
    			$return ="Phone";
    		}
    		else if($order->orders_source == "s")
    		{
    			$return ="Store";
    		}
    		//$return = $order->orders_source;
    		return $return;
    	})
    	->addColumn('delivery_date', function ($order) {
    		$return = "";
    		return $return;
    	})
    	->addColumn('order_date', function ($order) {
    		$return = \Carbon\Carbon::parse($order->created_at)->toDayDateTimeString();
    		return $return;

    	})
    	->addColumn('customer_name', function ($order) {
    		$name = "";
    		if(isset($order['user']->first_name))
    		{
    			$name ='<td><a href="/customers/'.$order['customer']->fk_user.'/edit" target="_blank">'.$order['user']->first_name." ".$order['user']->last_name." </br> < ".$order['user']->email."> </a></td>";
    		}
    		//$return = $order['user']->email;
    		$return = $name;
    		return $return;
    	})
    	->addColumn('status', function ($order) {
    		$return = $order['orderStatus']->status_name;
    		return $return;
    	})
    	->addColumn('action', function ($order) {
    		$return = '<td><a href="/order/'.$order->order_id.'"><i class="fa fa-search-plus"></i></a></td>';
    		return $return;
    	})->addColumn('customer_no', function ($order) {
    		$return = isset($order['customer']->contact_no)?$order['customer']->contact_no:"";
    		return $return;

    	})->rawColumns(['id','customer_name', 'action'])->make(true);
    }

    public function viewOrder($orderId){

        $country = Country::pluck('name','country_id')->toArray();
        $orderObj = new Order();
        $order = $orderObj->listOrder($orderId);
        //get customer detail
        //order detail
        $user = new User();
        $input['customer_id'] = $order->fk_customer;
        $custumerData = $user->customerQuery($input)->get();
        // get address details
		// statuses list
        $statuses =
        [
        		 ''  =>'Select Status',
        		 '0' =>'In Active',
        		 '1' =>'Active',
        ];

        $methods  = Helpers::getShipmentMethods();
        $shipment = new Shipment();
        $shippingDetail = $shipment->getShipment($orderId);

        $orderItemCount = count($order->orderItem);
        $createdItemCount = OrderItem::where('fk_order',$orderId)->where('fk_warehouse',">",0)->count();

        // get shipment status logs
        $logShipmentStatus = new LogShipmentStatus();
        $shipmentStatuslogsData	=  $logShipmentStatus->getStatusLogs($orderId);
        $orderStatuslogsData =[];
        //get order status logs
        $logOrderStatus = new LogOrderStatus();
        $orderStatuslogsData  =  $logOrderStatus->getStatusLogs($orderId);
  		$cancelReason	= new CancelReason();
      	$cancelReasons = $cancelReason->getAllForDropdown();

      	$orderStatuses = OrderStatus::pluck('status_name','status_code')->toArray();
        return view('orders::view',['orderStatuses'=>$orderStatuses,'cancelReasons'=>$cancelReasons,'orderStatuslogsData'=>$orderStatuslogsData,'shipmentStatuslogsData'=>$shipmentStatuslogsData,'orderItemCount'=>$orderItemCount,'createdItemCount'=>$createdItemCount,'shipping_details'=>$shippingDetail,'shipping_methods'=>$methods,'order'=>$order,'customerData'=>$custumerData[0],'countries'=>$country,'statuses'=>$statuses]);
    }

    public function saveAddress(Request $request)
    {
    	//save address
    	$input = $request->all();
     	$addressId = 	$input['address_id'];
     	$orderId = 	$input['order_id'];
     	$addressDetail = [];
     	if(isset($input['shipping']) )
     	{
     		$addressDetail  = $input['shipping'];
     	}
     	if(isset($input['billing']))
     	{
     		$addressDetail  = $input['billing'];
     	}
        $address = new Address();
     	$address->where('address_id',$addressId)->update($addressDetail);

        return redirect()->to("/order/".$orderId);

    }


    public function addComment (Request $request,$orderId)
    {
    	$input = $request->all();
    	//print_r($input);
    	//exit;
    	$id = Auth::user()->users_id;
    	$input['fk_order']  = $orderId;
    	$input['created_by']  =  $id;
    	OrderComment::create($input);
    	return redirect()->to("/order/".$orderId);

    }


    public function updateStatus(Request $request,$orderId)
    {

    	$input = $request->all();
    	$password = $input['supervisor_password'];
    	$toOrderStatus = $input['order_status'];
    	if(Helpers::verifySuperAdmin($password))
    	{
    		$orderDetail = Order::with('orderItem')->find($orderId)->toArray();
    		if($toOrderStatus == OrderStatus::CANCELLED )
    		{
    			$cancelReasonId = $input['order_cancel_reason'];
    			$orderItemIds = array_column($orderDetail['order_item'], 'order_product_id');
    			$orderItem = new OrderItem();
    			$orderItem->cancelItem($orderItemIds,$cancelReasonId,$orderId);
    		}
    		else {
    			$fromOrderStatus = $orderDetail['fk_order_status'];
    			$order = new Order();
    			$order->updateOrderStatus($fromOrderStatus,OrderStatus::getStatusIdByCode($toOrderStatus),$orderId);
    		}

    		$response['success'] ="Order status updated successfully";
    	}
    	else
    	{
    		$response['error'] = "Invalid supervisor password.Try Again!";
    	}

    	return $response;

    }

}
