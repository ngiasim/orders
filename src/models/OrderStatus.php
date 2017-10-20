<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderStatus extends Model
{
	use SoftDeletes;
    protected $table = 'order_status';
    protected $primaryKey = "order_status_id";




}
