<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::table('order', function($table) {
				$table->enum('is_gc', ['0', '1'])->default('0')->after('original_referer');
				$table->double('gc_amount', 15, 2)->default('0.00')->after('is_gc');
				$table->integer('fk_gift_card')->default('0')->after('gc_amount');
				
		});
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
		Schema::table('order', function($table) {
          $table->dropColumn('is_gc');
		  $table->dropColumn('gc_amount');
		  $table->dropColumn('fk_gift_card');
		});
    }
}
