<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentProduct extends Model
{
	use SoftDeletes;
    protected $table = 'shipment_product';
    protected $primaryKey = "shipment_product_id";

}
