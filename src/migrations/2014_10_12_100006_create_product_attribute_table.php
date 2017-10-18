<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     
    public function up()
    {
        Schema::create('product_attribute', function (Blueprint $table) {
            $table->increments('product_attribute_id',15);
            $table->integer('fk_product')->unsigned();
            $table->integer('fk_product_option')->unsigned();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('created_by')->default('0');
            $table->integer('updated_by')->default('0');
            $table->integer('deleted_by')->default('0');
            $table->foreign('fk_product')->references('product_id')->on('product');
            $table->foreign('fk_product_option')->references('product_option_id')->on('product_option');
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
