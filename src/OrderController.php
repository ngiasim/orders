<?php

namespace Ngiasim\Orders;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Product_description;
use App\Language;
use App\Product_status;
use App\User;


class OrderController extends Controller
{

  public function phoneOrder()
  {
      //dd(session()->all());
       $text = "hello asad raza";
       $cartItems = Cart::content();
       $total = Cart::total();
       $total_tax = Cart::tax();
       $customer_id = \Session::get('customer_id');
       $customers =  User::where('users_id', '=', $customer_id)->get();
       return view('orders::index', compact('text','cartItems','total','total_tax','customer_id','customers'));
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

  public function createOrderProcess(Request $request)
	{
	   	$input = $request->all();
      $sessionDetail  = session()->all();







			//\Session::put('customer_id', $input['customer_id']);

		// 	$customers =  User::where('users_id', '=', $input['customer_id'])->get();
		// 	$customerView = \View::make('orders::selectedcustomer',array("customers"=>$customers))->render();
		// 	$data = array(
	  //       "customerView" => $customerView
	  //   );
    //  return $this->generateSuccessResponse($data);
	}


}
