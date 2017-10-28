<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
	//use SoftDeletes;
    protected $table = 'warehouse';
    protected $primaryKey = "warehouse_id";

    public function WarehouseTotal()
    {
    	return $this->hasMany('App\Models\LogWarehouseTotal', 'warehouse_id', 'log_warehouse_total_id');
    }
}
