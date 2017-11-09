<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrderItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
		 Schema::table('order_item', function($table) {
				$table->enum('is_gc', ['0', '1'])->default('0')->after('peritem_discount');		
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		  Schema::table('order_item', function($table) {
			 $table->dropColumn('is_gc');
		});
    }
}
