<?php

// namespace App\Http\Controllers;
namespace Ngiasim\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Product;
use App\Models\Product_description;
use App\Models\Language;
use App\Models\Product_status;
use App\User;
use App\Models\InventoryItem;
use App\Models\Currency;
use App\Models\Country;
use App\Helpers\Helpers;


class CartController extends Controller
{
	public function index()
	{

      $currencyObj = Helpers::getCurrencySymbolwithdirection();
			$cartItems = Cart::content();
			$total = Cart::total('2','.','');
			$total_tax = Cart::tax('2','.','');
			$total_items = Cart::count();

			if (request()->getHost() == "store.femi9.local")
	    {
	       return view('store_cart::cart',compact('currencyObj','total_items','cartItems','total','total_tax'));
	    }else{
	    	 return view('cart::index',compact('currencyObj','cartItems','total','total_tax'));
		  }
	}

	public function addToCart(Request $request)
	{

			$region_country = \Session::get('region_country');
			$checkout_currency = \Session::get('checkout_currency');

			if ($region_country=="")
          $region_country = 233;

      if ($checkout_currency=="")
          $checkout_currency = 57;

			$reg_currency_data = Country::where('country_id', '=', $region_country)->get();
			$checout_currency_data = Currency::where('currency_id', '=', $checkout_currency)->get();

			$objCurrency = new Currency();


	   	$input = $request->all();
		 	$products =  Product::where('product_id', '=', $input['product_id'])->with('productsDescription')->get();
      $option["fk_product_status"] = $products[0]->fk_product_status;
			$option["invsku"] = $input['invsku'];
			$option["invId"] = $input['invId'];
			$option["base_price"] = $objCurrency->Conversion(1, $checout_currency_data[0]->conversion_rate, $products[0]->base_price); //$products[0]->base_price;
			$objInvItem = InventoryItem::find($input['invId']);
			$option["qty_unlimited"] = $objInvItem->qty_unlimited;
			$option["max_qty"] = ($objInvItem->qty_onhand-$objInvItem->qty_reserved-$objInvItem->qty_admin_reserved)+$objInvItem->qty_preorder;
			$price = $objCurrency->Conversion(1, $checout_currency_data[0]->conversion_rate, $products[0]->base_price)+ $objCurrency->Conversion(1, $checout_currency_data[0]->conversion_rate, $objInvItem->inventory_price); //$products[0]->base_price + $objInvItem->inventory_price;
			Cart::add($products[0]->product_id,$products[0]->productsDescription->products_name, 1, $price,$option);
			$cartItems = Cart::content();
		 	$total = Cart::total('2','.','');
			$total_tax = Cart::tax('2','.','');
			$checkout_currency_symbol_right = $checout_currency_data[0]->symbol_right;
		 	$cartView = \View::make('cart::index', array("checkout_currency_symbol_right"=>$checkout_currency_symbol_right,"cartItems"=>$cartItems,"total"=>$total,"total_tax"=>$total_tax))->render();
	    $data = array(
	        "cartview" => $cartView
	    );
     return $this->generateSuccessResponse($data);
	}

  public function updateCart(Request $request)
  {

    $input = $request->all();
  	$currencyObj = Helpers::getCurrencySymbolwithdirection();


    Cart::update($input['rowid'],$input['updateitemsarr']); // array('name' => 'Product 1'));
		$cartItems = Cart::content();
		$total = Cart::total('2','.','');
		$total_tax = Cart::tax('2','.','');
		$total_items = Cart::count();


		if (request()->getHost() == "store.femi9.local")
		{
			$cartView = \View::make('store_cart::cartlist', array("currencyObj"=>$currencyObj,"total_items"=>$total_items,"cartItems"=>$cartItems,"total"=>$total,"total_tax"=>$total_tax))->render();
			$quickcartView = \View::make('store_cart::quickcartlist', array("currencyObj"=>$currencyObj,"total_items"=>$total_items,"cartItems"=>$cartItems,"total"=>$total,"total_tax"=>$total_tax))->render();
			$data = array(
					"cartview" => $cartView,
					"quickcartview" => $quickcartView
			);
		  return $this->generateSuccessResponse($data);

		}else{

				$cartView = \View::make('cart::index', array("currencyObj"=>$currencyObj,"cartItems"=>$cartItems,"total"=>$total,"total_tax"=>$total_tax))->render();
				$data = array(
						"cartview" => $cartView
				);
			  return $this->generateSuccessResponse($data);
		}
  }

	public function deleteCartItem(Request $request)
	{
		$input = $request->all();
    //Cart::remove($rowId);
		$currencyObj = Helpers::getCurrencySymbolwithdirection();


    Cart::remove($input['rowid']);
		$cartItems = Cart::content();
		$total = Cart::total('2','.','');
		$total_tax = Cart::tax('2','.','');
		$total_items = Cart::count();


		if (request()->getHost() == "store.femi9.local")
		{
			$cartView = \View::make('store_cart::cartlist', array("currencyObj"=>$currencyObj,"total_items"=>$total_items,"cartItems"=>$cartItems,"total"=>$total,"total_tax"=>$total_tax))->render();
			$quickcartView = \View::make('store_cart::quickcartlist', array("currencyObj"=>$currencyObj,"total_items"=>$total_items,"cartItems"=>$cartItems,"total"=>$total,"total_tax"=>$total_tax))->render();
			$data = array(
					"cartview" => $cartView,
					"quickcartview" => $quickcartView
			);
		  return $this->generateSuccessResponse($data);

		}else{
				$cartView = \View::make('cart::index', array("currencyObj"=>$currencyObj,"cartItems"=>$cartItems,"total"=>$total,"total_tax"=>$total_tax))->render();
				$data = array(
						"cartview" => $cartView
				);
			 return $this->generateSuccessResponse($data);
		 }
	}

	public function addCustomerToCart(Request $request)
	{
	   	$input = $request->all();
			\Session::put('customer_id', $input['customer_id']);
			\Session::put('region_country', $input['region_country']);
			\Session::put('checkout_currency', $input['checkout_currency']);
			$customers =  User::where('users_id', '=', $input['customer_id'])->get();
			$customerView = \View::make('orders::selectedcustomer',array("customers"=>$customers))->render();
			$data = array(
	        "customerView" => $customerView
	    );
     return $this->generateSuccessResponse($data);
	}

	public function showproductlisting() {
		dd("agay");
	}




}
