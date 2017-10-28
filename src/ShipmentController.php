<?php

namespace Ngiasim\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Address;
use App\Models\Warehouse;
use App\Models\Shipment;
use DB;

class ShipmentController extends Controller
{
	public function pick(Request $request,$orderId)
	{
		$input = $request->all();
		
		//#todo : VV assign warehouse  --- it should check quantity available ,if not then dont need to create shipment of this item.
		//#todo : VV  shiping method is in shipment table  
		//#todo : question if only one product ship among 2 then shipment total contain product total
		if(count($input['warehouse']) > 0)
		{	
		
			$orderItemIds =[];
			foreach($input['warehouse'] as $orderItemId=>$warehouse)
			{
				if($warehouse != "0")
				{
					$orderItem = new OrderItem();
					$orderDetail['fk_warehouse'] = $warehouse;
					array_push($orderItemIds,$orderItemId);
					$orderItem->where('order_product_id',$orderItemId)->update($orderDetail);	 
				}
			}
		}
		 $shipment  = new Shipment();
		 $shipmentId	=  $shipment->createShipment($orderItemIds,$orderId);
		 //3- call to third party give you tracking no and details
		 $response =  $this->shippingThirdPartyCall();	
		 $shipment->updateShipment($response,$shipmentId);
		 return redirect()->to("/order/".$orderId);
	}

	public function shippingThirdPartyCall()
	{
		$response = ['tracking_no'=>'123456'];
		return $response;
	}
	public function ship()
	{	
		//any forceship ??
		//status logs used instead of shipped ,canceled ,delivered
		//2- inventory update, warehouse_logs update
		//ship quantity update to order_item and shipment_product
	}
	
}