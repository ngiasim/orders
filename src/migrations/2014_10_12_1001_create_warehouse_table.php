<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWarehouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {

        Schema::create('warehouse', function (Blueprint $table) {
            $table->increments('warehouse_id',15);
            $table->integer('fk_address');  
            $table->enum('type', ['store', 'warehouse'])->default('store');
            $table->string('name',64)->nullable();
            $table->string('display_name',64)->nullable();
            $table->text('description')->nullable();
            $table->string('code',64)->nullable();
            $table->integer('sort_order');
            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('warehouse');
    }
}
