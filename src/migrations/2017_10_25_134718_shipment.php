<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shipment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    	Schema::create('shipment', function (Blueprint $table) {
    		$table->increments('shipment_id',15);
    		$table->integer('fk_order');
    		$table->string('auth_code',255)->nullable();
    		$table->string('auth_trans_id',255)->nullable();
    		$table->string('auth_detail',255)->nullable();
    		$table->string('token',255)->nullable();
    		$table->double('shipping', 15, 2)->default('0.00');
    		$table->double('shipping_tax', 15, 2)->default('0.00');
    		$table->double('tax', 15, 2)->default('0.00');
    		$table->double('duty', 15, 2)->default('0.00');
    		$table->double('total', 15, 2)->default('0.00');
    		$table->double('disctotal', 15, 2)->default('0.00');
    		$table->dateTime('shipment_date')->nullable();
    		$table->dateTime('delivery_date')->nullable();	
    		$table->integer('delivered')->nullable();
    		$table->double('giftwrap', 5, 2)->default('0.00');
    		$table->string('tracking',255)->nullable();
    		$table->double('cash', 15, 2)->default('0.00');
    		$table->integer('status')->default('0');
    		$table->integer('is_exchange')->default('0');
    		$table->integer('is_partial_ship_by_wh')->default('0');
    		$table->integer('no_return')->default('0');
    		$table->integer('seq_no')->default('0');
    		$table->double('adjust_amount', 15, 2)->default('0.00');
    		$table->integer('is_cancelled')->default('0');
    		$table->string('cancel_reason',255)->nullable();
    		$table->integer('created_by')->default(0);
    		$table->integer('updated_by')->default(0);
    		$table->integer('deleted_by')->default(0);
    		$table->timestamps();
    		$table->softDeletes();
    		 
    	});
    	
    		Schema::table('shipment', function (Blueprint $table) {
    			$table->foreign('fk_order')->references('order_id')->on('order');
    		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    	Schema::dropIfExists('shipment');
    }
}
