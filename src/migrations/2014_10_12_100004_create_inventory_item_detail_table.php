<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItemDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('inventory_item_detail', function (Blueprint $table) {
            $table->increments('inventory_item_detail_id',15);
            $table->integer('fk_inventory_item')->unsigned();
            $table->integer('fk_product_option')->unsigned();
            $table->integer('fk_product_option_values')->unsigned();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('created_by')->default('0');
            $table->integer('updated_by')->default('0');
            $table->integer('deleted_by')->default('0');
            $table->foreign('fk_product_option')->references('product_option_id')->on('product_option');
            $table->foreign('fk_inventory_item')->references('inventory_id')->on('inventory_item');
            $table->foreign('fk_product_option_values')->references('product_option_value_id')->on('product_option_value');
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
        Schema::dropIfExists('inventory_item_detail');
    }
}
