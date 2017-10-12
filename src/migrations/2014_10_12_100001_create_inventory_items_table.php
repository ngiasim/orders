<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->increments('inventory_id',15);
            $table->string('inventory_code',64)->nullable();
            $table->double('weight',13,2)->default('0.00');
            $table->integer('qty_onhand')->default('0.00');
            $table->integer('qty_reserved')->default('0');
            $table->integer('qty_preorder')->default('0');
            $table->integer('qty_total')->default('0');
            $table->integer('qty_admin_reserved')->default('0');
            $table->string('barcode',128)->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('created_by')->default('0');
            $table->integer('updated_by')->default('0');
            $table->integer('deleted_by')->default('0');
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
        Schema::dropIfExists('inventory_items');
    }
}
