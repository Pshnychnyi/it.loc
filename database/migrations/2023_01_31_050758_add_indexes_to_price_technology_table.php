<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndexesToPriceTechnologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('price_technology', function (Blueprint $table) {
        	$table->integer('price_id')->unsigned()->default(1);
            $table->foreign('price_id')->references('id')->on('prices');

            $table->integer('technology_id')->unsigned()->default(1);
            $table->foreign('technology_id')->references('id')->on('technologies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('price_technology', function (Blueprint $table) {
            $table->dropForeign(['price_id']);
            $table->dropForeign(['technology_id']);
            
            $table->dropColumn('price_id');
            $table->dropColumn('technology_id');
        });
    }
}
