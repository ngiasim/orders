<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LogShipmentStatus extends Model
{
	use SoftDeletes;
    protected $table = 'log_shipment_status';
    protected $primaryKey = "log_shipment_status_id";




}
