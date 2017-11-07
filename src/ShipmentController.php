<?php

namespace Ngiasim\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\InventoryItem;
use App\Models\Address;
use App\Models\Warehouse;
use App\Models\Shipment;
use App\Models\ShipmentStatus;
use App\Models\ShipmentProduct;
use App\Models\LogWarehouseTotal;
use DB;

class ShipmentController extends Controller
{
	
	public function updateOrder (Request $request,$orderId)
	{
		$input = $request->all();
	
		
		if(isset($input['pick']))
		{
			
			$this->pick($input,$orderId);
		}
		
		else if(isset($input['cancel']))
		{

			$this->cancel($input,$orderId);
		}
		
		return redirect()->to("/order/".$orderId);
		
	}
	
	public function cancel($inputData,$orderId)
	{
		
		$orderItemId = $inputData['order_item_id'];
		$cancelReasonId = $inputData['cancel_reason'];
		$orderItem = new OrderItem();
		$orderItem->cancelItem($orderItemId,$cancelReasonId,$orderId);
		return redirect()->to("/order/".$orderId);

		
	}
	public function pick($input,$orderId)
	{

		
		//assign warehouse  --- it should check quantity available ,if not then dont need to create shipment of this item.		
		if(count($input['warehouse']) > 0)
		{	
			// make order status in process
			$orderItemIds =[];
			foreach($input['warehouse'] as $orderItemId=>$warehouse)
			{
				$orderItem = new OrderItem();
				$orderItemDetail = $orderItem->where('order_product_id',$orderItemId)->where('is_cancelled',0)->first();
				if($warehouse != "0" && !empty($orderItemDetail))
				{
					
					$orderedQuantity = $orderItemDetail->ordered_quantity;
					$inventoryId = $orderItemDetail->fk_inventory;
					$logWarehouseTotal = new LogWarehouseTotal();
					 $availableQuantity = $logWarehouseTotal->getAvailableQuantity($warehouse ,$inventoryId);
					// get order quantity and available quantity 
					// check 
					if($availableQuantity >= $orderedQuantity)
					{
						$orderDetail['fk_warehouse'] = $warehouse;
						array_push($orderItemIds,$orderItemId);
						$orderItem->where('order_product_id',$orderItemId)->update($orderDetail);	 
					}
				}
			}
		}
	
		 $shipment  = new Shipment();
		 $shipmentId	=  $shipment->createShipment($orderItemIds,$orderId,$input);
		 //if shipment created
		 if($shipmentId > 0)
		 {
			 //3- call to third party give you tracking no and details
			 $response =  $this->shippingThirdPartyCall();	
			 $shipment->updateShipment($response,$shipmentId);
		 }
		 
	}

	public function shippingThirdPartyCall()
	{
		$response = ['tracking_no'=>uniqid()];
		return $response;
	}
	public function deliver($orderId,$shipmentId)
	{	
		//update shipment status using orderId
		$shipment  = new Shipment();
		// from shipped to delivered
		$from = ShipmentStatus::getStatusIdByCode(ShipmentStatus::SHIPPED);
		$to = ShipmentStatus::getStatusIdByCode(ShipmentStatus::DELIVERED);
		$shipment->updateShipmentStatus($from,$to,$orderId,$shipmentId);
		$shipment->updateInventoryAndLogs($orderId,$shipmentId);
		$order = new Order();
		$order->updateShipmentAndOrder($orderId);
		return redirect()->to("/order/".$orderId);
	
		
	}
	
}