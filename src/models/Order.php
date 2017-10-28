<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{ //check
	use SoftDeletes;
    protected $table = 'order';
    protected $primaryKey = "order_id";

    //protected $fillable = ['fk_brand','fk_product_status','products_sku','meta_keywords','meta_description'];
		public function user()
		{
	       return $this->belongsTo('App\User','fk_customer','users_id');
		}
		public function customer()
		{
			return $this->belongsTo('App\Customer', 'fk_customer', 'fk_user');
		}
		
		public function billingAddress()
		{
			return $this->belongsTo('App\Models\Address','fk_address_billing','address_id');
		}
		
		public function shippingAddress()
		{
			return $this->belongsTo('App\Models\Address','fk_address_shipping','address_id');
		}
			
		public function orderStatus()
		{
			return $this->belongsTo('App\Models\OrderStatus','fk_order_status','order_status_id');
		}
		public function orderItem()
	 	{
			 return $this->hasMany('App\Models\OrderItem', 'fk_order', 'order_id');
	 	}
	 	public function orderComment()
	 	{
	 		return $this->hasMany('App\Models\OrderComment', 'fk_order', 'order_id');
	 	}

		public function getOrdersByFilters($filter) {
		  $data = $this->with(array('user','customer','orderStatus'))->orderBy('order_id','DESC');
		  if(count($filter))
		  {
			   if(!empty($filter['customer_id']))
			   {
					 $data = $data->where('fk_customer',  '=', $filter['customer_id']);
			   }
			   
			   if(!empty($filter['order_id']))
			   {
			   	$data = $data->where('order_id', $filter['order_id']);
			   }
			   if(!empty($filter['contact_no']))
			   {
			 
			   	$data->whereHas('customer', function($data) use ($filter)
			   	{
			   		// Now querying on tableB
			   		$data = $data->where('contact_no', $filter['contact_no']);
			   	});
			   }
			   
			   if(!empty($filter['customer']))
			   {
			   
			   	$data->whereHas('user', function($data) use ($filter)
			   	{
			   		// Now querying on tableB
			
			   		$data = $data->where('users.first_name',  'like', '%'.$filter['customer'].'%')->orWhere('users.last_name',  'like', '%'.$filter['customer'].'%');
			   		$data = $data->orWhere('users.email', $filter['customer']);
			   	});
			   }
			   if(!empty($filter['status']))
			   {
			   	$data = $data->where('fk_order_status', $filter['status']);
			   }
			   
			   if(!empty($filter['order_source']))
			   {
			   	$data = $data->where('orders_source', $filter['order_source']);
			   }
			   
			   
		  }

		   	return $data->get();
		}

    // public function productsDescription()
    // {
    //     return $this->hasOne('App\Product_description', 'fk_product', 'product_id');
    // }

    // protected function rules($except_id=""){
    //     $arr =  array(
    //         'meta_keywords'              => 'required|max:200' ,
    //         'meta_description'           => 'required|max:2000',
    //         'fk_product_status'          => 'required|integer',
    //         'products_sku'               => 'required|max:200'
    //     );
		//
    //     return $arr;
    // }

    // protected function addProducts($request){
    // 	/*$this->fill([
    //             'id_brands'            => $request->id_brands,
    //             'products_sku'         => $request->products_sku,
    //             'meta_keywords'        => $request->meta_keywords,
    //             'meta_description'     => $request->meta_description
    //         ]);*/
		//
    //         $this->fill([
    //             'fk_brand'            => 1,
    //             'meta_keywords'        => $request->meta_keywords,
    //             'meta_description'     => $request->meta_description,
    //             'fk_product_status'    => $request->fk_product_status,
    //             'products_sku'         => $request->products_sku
    //         ]);
		//
    //         $this->save();
    //         return $this->product_id;
    // }

    // protected function updateProducts($request,$id){
    //     $products = $this->find($id);
    //     $products->meta_keywords        = $request->meta_keywords;
    //     $products->meta_description     = $request->meta_description;
    //     $products->fk_product_status    = $request->fk_product_status;
    //     $products->products_sku         = $request->products_sku;
    //     $products->save();
    // }
		//
    // protected function deleteProducts($id){
    //     $products = $this->find($id);
    //     $products->delete();
    // }


}
