<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShipmentProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
    	Schema::create('shipment_product', function (Blueprint $table) {
    		$table->increments('shipment_product_id',15);
    		$table->integer('fk_shipment')->unsigned();
    		$table->integer('fk_order')->unsigned();
    		$table->integer('fk_order_product')->unsigned();
    		$table->integer('quantity')->default('0.00');
    		$table->integer('quantity_shipped')->default('0.00');
    		$table->text('attributes')->nullable();
    		$table->string('storeitemid',255)->nullable();
    		$table->string('name',255)->nullable();
    		$table->double('amount', 15, 2);
    		$table->string('promocode',15)->nullable();
    		$table->double('peritem', 15, 2);
            $table->double('peritem_tax', 15, 2);
            $table->double('peritem_discount', 15, 2);
            $table->double('peritem_duty', 15, 2);
    		$table->integer('no_return')->default('0');
			$table->integer('created_by')->default(0);
    		$table->integer('updated_by')->default(0);
    		$table->integer('deleted_by')->default(0);
    		
    		 
    		$table->timestamps();
    		$table->softDeletes();
    		 
    	});
    	
    		/*Schema::table('shipment_product', function (Blueprint $table) {
    		$table->foreign('fk_shipment')->references('shipment_id')->on('shipment');
    		$table->foreign('fk_order')->references('order_id')->on('order');
    		$table->foreign('fk_order_product')->references('order_product_id')->on('order_product');
    		});*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    	Schema::dropIfExists('shipment_product');
    }
}
