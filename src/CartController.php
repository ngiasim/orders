<?php

// namespace App\Http\Controllers;
namespace Ngiasim\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Product_description;
use App\Language;
use App\Product_status;
use App\User;

class CartController extends Controller
{
	public function index()
	{
			$cartItems = Cart::content();
			$total = Cart::total();
			$total_tax = Cart::tax();
	    return view('cart::index',compact('cartItems','total','total_tax'));
	}

	public function addToCart(Request $request)
	{
	   	$input = $request->all();
		 	$products =  Product::where('product_id', '=', $input['product_id'])->with('productsDescription')->get();
      $option["fk_product_status"] = $products[0]->fk_product_status;
			$option["invsku"] = $input['invsku'];
			$option["invId"] = $input['invId'];
			Cart::add($products[0]->product_id,$products[0]->productsDescription->products_name, 1, $products[0]->base_price,$option);
			$cartItems = Cart::content();
		 	$total = Cart::total();
			$total_tax = Cart::tax();
		 	$cartView = \View::make('cart::index', array("cartItems"=>$cartItems,"total"=>$total,"total_tax"=>$total_tax))->render();
	    $data = array(
	        "cartview" => $cartView
	    );
     return $this->generateSuccessResponse($data);
	}

  public function updateCart(Request $request)
  {
    $input = $request->all();
    //Cart::update($input['rowid'], array('qty' => 8));
    Cart::update($input['rowid'],$input['updateitemsarr']); // array('name' => 'Product 1'));
		$cartItems = Cart::content();
		$total = Cart::total();
		$total_tax = Cart::tax();
		$cartView = \View::make('cart::index', array("cartItems"=>$cartItems,"total"=>$total,"total_tax"=>$total_tax))->render();
		$data = array(
				"cartview" => $cartView
		);
	 return $this->generateSuccessResponse($data);
  }

	public function deleteCartItem(Request $request)
	{
		$input = $request->all();
    //Cart::remove($rowId);
    Cart::remove($input['rowid']);
		$cartItems = Cart::content();
		$total = Cart::total();
		$total_tax = Cart::tax();
		$cartView = \View::make('cart::index', array("cartItems"=>$cartItems,"total"=>$total,"total_tax"=>$total_tax))->render();
		$data = array(
				"cartview" => $cartView
		);
	 return $this->generateSuccessResponse($data);
	}

	public function addCustomerToCart(Request $request)
	{
	   	$input = $request->all();
			\Session::put('customer_id', $input['customer_id']);
			$customers =  User::where('users_id', '=', $input['customer_id'])->get();
			$customerView = \View::make('orders::selectedcustomer',array("customers"=>$customers))->render();
			$data = array(
	        "customerView" => $customerView
	    );
     return $this->generateSuccessResponse($data);
	}


}
