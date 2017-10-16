<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionValueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('product_option_value', function (Blueprint $table) {
            $table->increments('product_option_value_id',15);
            $table->integer('fk_product_option')->unsigned();
            $table->string('name',20)->nullable();
            $table->string('code',20)->nullable();
            $table->string('display_name',64)->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->integer('created_by')->default('0');
            $table->integer('updated_by')->default('0');
            $table->integer('deleted_by')->default('0');
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
        Schema::dropIfExists('product_option_value');
    }
}
