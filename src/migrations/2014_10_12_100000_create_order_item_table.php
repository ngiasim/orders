<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {

        Schema::create('order_item', function (Blueprint $table) {
            $table->increments('order_product_id',15);
            $table->integer('fk_order');
            $table->integer('fk_product');
            $table->integer('fk_product_status');
            $table->integer('fk_warehouse');
            $table->string('products_name',64)->nullable();
            $table->double('products_price',13,2);
            $table->integer('fk_inventory')->unsigned();
            $table->string('inventory_code',64);
            $table->integer('ordered_quantity')->default('0');
            $table->integer('shipped_quantity')->default('0');
            $table->integer('is_returnable')->default('1');
            $table->integer('is_exchanged')->default('0');
            $table->integer('is_cancelled')->default('0');
            $table->string('cancel_reason',255)->nullable();
            $table->integer('is_taxable')->default('1');
            $table->double('percent_off',13,2)->default('0.00');
            $table->double('weight',13,2)->default('0.00');
            $table->string('pgc_number',100)->nullable();
            $table->string('promocode',15)->nullable();
            $table->double('peritem_tax', 15, 2);
            $table->double('peritem_discount', 15, 2);
            $table->dateTime('deleted_at')->nullable();
            $table->integer('created_by')->default('0');
            $table->integer('updated_by')->default('0');
            $table->integer('deleted_by')->default('0');
            ///$table->foreign('fk_order')->references('order_id')->on('order');
            //$table->foreign('fk_product_status')->references('product_status_id')->on('product_status');
            //$table->foreign('fk_warehouse')->references('warehouse_id')->on('warehouse');
            //$table->foreign('fk_address_billing')->references('address_id')->on('address');
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
        Schema::dropIfExists('order_item');
    }
}
