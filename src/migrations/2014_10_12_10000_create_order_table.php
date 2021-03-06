<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {

        Schema::create('order', function (Blueprint $table) {
            $table->increments('order_id',15);
            $table->integer('fk_order_status');
            $table->integer('fk_customer');
            $table->string('payment_method',64)->nullable();
            $table->string('cc_type',32)->nullable();
            $table->string('cc_name',32)->nullable();
            $table->string('cc_number',16)->nullable();
            $table->date('cc_expiry')->nullable();
            $table->text('authtransid')->nullable();
            $table->string('shipping_method',64);
            $table->double('shipping_amount', 15, 2);
            $table->double('shipping_tax',13,2);
            $table->double('tax',13,2);
            $table->double('order_total',13,2);
            $table->double('discount_total',13,2)->nullable();
            $table->string('promocode',15);
            $table->double('store_credit',13,2);
            $table->double('order_final_total',13,2);
            $table->date('expected_delivery_date')->nullable();
            $table->string('customers_remote_ip',15);
            $table->text('customers_comment');
            $table->char('orders_source',1);
            $table->string('checkout_currency_code',3)->default('USD');
            $table->float('checkout_currency_rate');
            $table->string('original_referer',255);
            $table->dateTime('deleted_at')->nullable();
            $table->integer('fk_address_shipping')->unsigned();
            $table->integer('fk_address_billing')->unsigned();
            //$table->foreign('fk_order_status')->references('order_status_id')->on('order_status');
            //$table->foreign('fk_customer')->references('customer_id')->on('customers');
            //$table->foreign('fk_address_shipping')->references('address_id')->on('address');
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
        Schema::dropIfExists('order');
    }
}
