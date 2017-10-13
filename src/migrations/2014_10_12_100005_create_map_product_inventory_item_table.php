<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapProductInventoryItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('map_product_inventory_item', function (Blueprint $table) {
            $table->increments('map_product_inventory_item_id',15);
            $table->integer('fk_product')->unsigned();
            $table->integer('fk_inventory_item')->unsigned();
            $table->dateTime('deleted_at')->nullable();
            //$table->foreign('fk_product')->references('product_id')->on('product');
            //$table->foreign('fk_inventory_item')->references('inventory_item_id')->on('inventory_items');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('map_product_inventory_item');
    }
}
