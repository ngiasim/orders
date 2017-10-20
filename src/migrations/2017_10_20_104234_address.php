<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Address extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

		    Schema::create('address', function (Blueprint $table) {
            $table->increments('address_id',15);
			$table->string('type',1)->nullable();
			$table->string('first_name',64);
			$table->string('last_name',64);
            $table->string('email');
			$table->string('line1',20)->nullable();
			$table->string('line2',20)->nullable();
			$table->string('line3',20)->nullable();
			$table->string('city',20)->nullable();
			$table->string('state',20)->nullable();
			$table->string('phone1')->nullable();
			$table->string('mobile1',20)->nullable();
			$table->string('latitude',20)->nullable();
			$table->string('longitude')->nullable();
			$table->string('google_map',20)->nullable();
            $table->integer('fk_customer')->unsigned();
            $table->integer('fk_language')->unsigned();
			$table->integer('fk_country')->unsigned();
			$table->integer('created_by')->default(0);
			$table->integer('updated_by')->default(0);
			$table->integer('deleted_by')->default(0);
            $table->foreign('fk_customer')->references('customer_id')->on('customers');
			//$table->foreign('fk_language')->references('language_id')->on('language');
			$table->foreign('fk_country')->references('country_id')->on('country');
            $table->timestamps();
			$table->softDeletes();
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		       Schema::dropIfExists('address');
        //
    }
}
