<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Order;
use App\Models\LogShipmentStatus;
use App\Models\ShipmentProduct;
use Illuminate\Support\Facades\Auth;
class Shipment extends Model
{
	use SoftDeletes;
    protected $table = 'shipment';
    protected $primaryKey = "shipment_id";

    public function shipmentStatus()
    {
    	return $this->belongsTo('App\Models\ShipmentStatus','status','shipment_status_id');
    }
    
    
    public function createShipment($orderItemIds ,$orderId) {
    	//1- shipment created->with status created
    	//entries in shipment and shipment_product
    	//and shipment status logs
    	$shipmentId = 0;
    	$userId = Auth::user()->users_id;
    	if(count($orderItemIds) > 0)
    	{
    		///create shipment
    		$orderDetail = Order::find($orderId);
    		$this->fk_order = $orderId;
    		//TODO : First study lag fields and then add pricing 
    		//$shipmentData['shipping'] = $orderDetail->shipping_amount;
    		//$shipmentData['shipping_tax'] = $orderDetail->shipping_tax;
    		//$shipmentData['total'] = $orderDetail->order_total;
    		//$shipmentData['disctotal'] = $orderDetail->discount_total;
    		// status : created = 1;
    		$this->status= 1 ;
    		$this->created_by = $userId ;
    		$this->updated_by = $userId ;
    		$this->save();
    		//$shipment 	= Shipment::Create($shipmentData);
    	  	$shipmentId = $this->shipment_id;

    	  	foreach($orderItemIds as $key=>$orderItem)
    	  	{
    	  		$orderItemDetail = OrderItem::find($orderItem);
    	  		$shipmentProduct = new ShipmentProduct();
    	  		$shipmentProduct->fk_order = $orderId;
    	  		$shipmentProduct->fk_shipment =  $shipmentId ;
    	  		$shipmentProduct->fk_order_product =$orderItemDetail->order_product_id;
    	  		$shipmentProduct->quantity =$orderItemDetail->ordered_quantity;
    	  		$shipmentProduct->promocode =$orderItemDetail->promocode;
    	  		$shipmentProduct->peritem=$orderItemDetail->products_price;
    	  		$shipmentProduct->peritem_tax =$orderItemDetail->peritem_tax;
    	  		$shipmentProduct->peritem_discount =$orderItemDetail->peritem_discount;
    	  		$shipmentProduct->amount =0;
    	  		$shipmentProduct->peritem_duty =0;
    	  		$shipmentProduct->created_by= $userId ;
    	  		$shipmentProduct->updated_by= $userId ;
    	  		$shipmentProduct->save();  		
    	  	}
    	  	
    	  	
    	}
    	return $shipmentId;
    }
    
    public function updateShipment($response ,$shipmentId) {
    	//update shipment with third party response
    	$shipmentDetail['tracking'] = $response['tracking_no'];
    	$this->where('shipment_id',$shipmentId)->update($shipmentDetail);
       
    }
    
    public function getShipment($orderId)
    {
    	$shipment	= $this->with(array('shipmentStatus'))->where('fk_order',$orderId)->get();
    	
 
    	return $shipment;
    }
}
