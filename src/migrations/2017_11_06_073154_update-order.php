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
			$table->integer('created_by')->default('0')->after('original_referer');
            $table->integer('updated_by')->default('0')->after('created_by');			
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::table('order', function($table) {
          $table->dropColumn('created_by');
		  $table->dropColumn('updated_by');
		});
    }
}
