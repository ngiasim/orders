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


class OrderController extends Controller
{

  public function phoneOrder()
  {

      //dd(session()->all());
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
    $products =  Product::where('product_id', '=', $id)->orWhere('meta_keywords','like','%'.$id.'%')->with('productsDescription')->get();
    $productView = \View::make('orders::productlisting', array("products"=>$products))->render();
    $data = array(
        "productView" => $productView
    );
    return $this->generateSuccessResponse($data);
  }

  public function getCustomersByCustomerId($id)
  {
    $customers =  User::where('users_id', '=', $id)->orWhere('email','like','%'.$id.'%')->get();
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
                $orderItem->products_price=$item->price;
                $orderItem->ordered_quantity=$item->qty;
                $orderItem->peritem_tax= ($item->price*($item->taxRate/100))*$item->qty; // $item->id;
                $orderItem->fk_warehouse = 1;
                $orderItem->save();
                Cart::remove($item->rowId);
              }
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

    public function index(){
        $orders = Order::all();

        return view('orders::listview',['orders'=>$orders]);
    }

    public function viewOrder($orderId){
        $order = Order::find($orderId);
        return view('orders::view',['order'=>$order]);
    }


}
