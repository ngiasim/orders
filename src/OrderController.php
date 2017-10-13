<?php

namespace Ngiasim\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Product_description;
use App\Language;
use App\Product_status;
use App\User;
use App\Order;
use App\OrderItem;
use App\ProductOption;
use App\ProductAttribute;
use App\ProductOptionValue;
use DB;

class OrderController extends Controller
{

  public function phoneOrder()
  {
       //dd(\Session::all());
       $cartItems = Cart::content();
       $total = Cart::total();
       $total_tax = Cart::tax();
       $customer_id = \Session::get('customer_id');
       $customers =  User::where('users_id', '=', $customer_id)->get();
       return view('orders::index', compact('cartItems','total','total_tax','customer_id','customers'));
  }

  public function getProductsByProductId($id)
  {

    // $products =  Product::with(array('productsDescription' => function($query) {
    //       $query->where('products_name', 'like','%Jacket%')->orwhere('product_id', '=', "Jacket");
    //    }))->get();
    //$products =  Product::where('product_id', '=', $id)->orWhere('meta_keywords','like','%'.$id.'%')->with('productsDescription')->get();
    $products =  Product::where('product_id', '=', $id)
    ->orWhere('meta_keywords','like','%'.$id.'%')
    ->with('productsDescription')
    ->with('ProductAttribute')
    ->get();

     foreach ($products as $option ) {
       $products_attributes= DB::select('Select inventory_id,p.products_sku,inventory_code,product_option_id,po.name as option_name,pov.name
                         from inventory_items ii,inventory_item_detail iid,product_option_value pov,product_option po
                         ,product p,map_product_inventory_item mpii
                         where inventory_id = iid.fk_inventory_item
                         and iid.fk_product_option_values = product_option_value_id
                         and iid.fk_product_option = product_option_id
                         and mpii.fk_inventory_item = ii.inventory_id
                         and product_id = mpii.fk_product
                         and product_id ='.$option->product_id);
       //dd($products_attributes);
        $json_cook_atributes_product ;
        $cook_atributes_product ;
        foreach ($products_attributes as $pa ) {
          //$cook_atributes_product[$option->products_sku][$option->name]
          foreach ($option->ProductAttribute as $inneratribute ) {

              if($pa->product_option_id == $inneratribute->fk_product_option){
                   $cook_atributes_product[$pa->products_sku][$pa->option_name][]=$pa->name;
              }
          }
          $cook_atributes_product[$pa->products_sku][$pa->option_name] = array_unique($cook_atributes_product[$pa->products_sku][$pa->option_name]);


          $json_cook_atributes_product[$pa->products_sku][$pa->inventory_code]["options"][$pa->option_name]=$pa->name;
          $json_cook_atributes_product[$pa->products_sku][$pa->inventory_code]["inventory_id"] = $pa->inventory_id;
        }

     }

    $productView = \View::make('orders::productlisting', array("products"=>$products,"cook_atributes_product"=>$cook_atributes_product,"json_cook_atributes_product"=>json_encode($json_cook_atributes_product)))->render();
    $data = array(
        "productView" => $productView
    );
    return $this->generateSuccessResponse($data);
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
        $total = Cart::total() - Cart::tax();
        $customer_id = \Session::get('customer_id');

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
            $order->tax= Cart::tax();
            $order->order_total= $total;
            $order->fk_order_status= 1;
            $order->order_final_total= Cart::total();
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
                $orderItem->products_price=$item->price;
                $orderItem->ordered_quantity=$item->qty;
                $orderItem->peritem_tax= ($item->price*($item->taxRate/100))*$item->qty; // $item->id;
                $orderItem->fk_warehouse = 1;
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
         $order = new Order();
         $filter = Array();
        //  if ($input['customer_id'])
        //  {
        //    $filter['customer_id'] = $input['customer_id'];
        //  }
         //dd($input['customer_id']);
         $orders = $order->getOrdersByFilters($input);
        //$orders = Order::all();

        return view('orders::listview',['orders'=>$orders]);
    }

    public function viewOrder($orderId){
        $order = Order::find($orderId);
        return view('orders::view',['order'=>$order]);
    }


}
