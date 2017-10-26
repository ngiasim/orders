<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        
    	Schema::create('order_comment', function (Blueprint $table) {
    		$table->increments('order_comment_id',15);
    		$table->string('subject',50)->nullable();
    		$table->text('message')->nullable();
    		$table->enum('is_emailed', ['0', '1'])->default('0');
    		$table->integer('fk_order');
    		$table->integer('created_by')->default(0);
    	
    		$table->timestamps();
    		$table->softDeletes();
    			
    	});
    	
    		Schema::table('order_comment', function (Blueprint $table) {
    				$table->foreign('fk_order')->references('order_id')->on('order');
    		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::dropIfExists('order_comment');
        //
    }
}
