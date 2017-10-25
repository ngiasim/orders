<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderComment extends Model
{
	//use SoftDeletes;
    protected $table = 'order_comment';
    protected $primaryKey = "order_comment_id";



    protected $fillable = ['fk_order', 'subject', 'message', 'is_emailed','created_by', 'created_at', 'updated_at', 'deleted_at'];
}
