<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentStatus extends Model
{
	use SoftDeletes;
    protected $table = 'shipment_status';
    protected $primaryKey = "shipment_status_id";

}
