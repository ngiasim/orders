<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('product_option', function (Blueprint $table) {
            $table->increments('product_option_id',15);
            $table->string('name',64)->nullable();
            $table->string('display_name',64)->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->timestamps();
            $table->integer('created_by')->default('0');
            $table->integer('updated_by')->default('0');
            $table->integer('deleted_by')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_option');
    }
}
