<?php

namespace Ngiasim\Orders;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Product_description;
use App\Language;
use App\Product_status;

class OrderController extends Controller
{

    public function phoneOrder()
    {
         $text = "hello asad raza";
         $cartItems = Cart::content();
         $total = Cart::total();
         return view('orders::index', compact('text','cartItems','total'));
    }

    public function getProductsByProductId($id)
    {
      $products =  Product::where('product_id', '=', $id)->with('productsDescription')->get();
	  $producthtmlMiddle = "";
	  $producthtmlUp = "<table class='table table-bordered ' id='table_data'><thead><tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>price</th>
			<th>Action</th>
          </tr>
        </thead>
        <tbody>";
    foreach($products as $row){
          $producthtmlMiddle .= "<tr>
            <td>".$row->product_id."</td>
            <td>".$row->productsDescription->products_name."</td>
            <td>".$row->base_price."</td>
			<td>
                <button type='button' onclick='addtocart(".$row->product_id.");' class='glyphicon glyphicon-shopping-cart'></button>
          </tr>";
    }


    $producthtmlBottom = $producthtmlUp.$producthtmlMiddle."</tbody> </table>";
	  echo json_encode($producthtmlBottom);

     // return view('products::index',compact('products'));
    }

	public function getCart()
	{

	     return view('cart.index');
	}

}
