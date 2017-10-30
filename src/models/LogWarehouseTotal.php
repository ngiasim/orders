<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Warehouse ;
class LogWarehouseTotal extends Model
{
	//use SoftDeletes;
    protected $table = 'log_warehouse_total';
    protected $primaryKey = "log_warehouse_total_id";


    public function getWarehouseWithQuantity($inventoryId)
    {
    	$quantity = 0;
    	$warehouse = new  Warehouse();
    	$warehouses =$warehouse->getWarehouses();
   
    	foreach ($warehouses as $key=> &$value) {
    		$inventoryQuantity =  $this->selectRaw(' sum(quantity) as Quantity')
    		->where('fk_warehouse', $key)
    		->where('fk_inventory', $inventoryId)
    		->groupBy('fk_warehouse')
    		->first();
    		 
    	
    		if(count($inventoryQuantity) > 0)
    		{
    				$quantity	= $inventoryQuantity->Quantity;
    			
    		}	
    		
    		$value = $value.' ('.$quantity.') ';
    		
    		//get warehouse quantity
    		
    	}
    

    	
    	 unset($value);
    	 
    	 return $warehouses;
    }

    public function addWarehouseLogs($warehouseId,$inventoryId,$quantity)
    {
    	$userId = Auth::user()->users_id;
    	$this->fk_warehouse = $warehouseId;
    	$this->fk_inventory = $inventoryId; 
    	// todo  :no vendor concept 10/27/2017
    	$this->fk_vendor = 0;
    	$this->action = "";
    	$this->memo = "";
    	$this->quantity = $quantity;
    	$this->created_by= $userId ;
    	$this->updated_by= $userId ;
    	$this->save();
    	
    }

}
