<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('limits', function (Blueprint $table) {
            $table->increments('limits_id')->unsigned()->index(); 
            $table->integer('user_id')->unsigned()->index()->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('market_cost');
            $table->integer('travelling_cost');
            $table->integer('fuel_cost');
            $table->integer('postage_cost');
            $table->integer('fax_cost');
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
        Schema::drop('budget'); 
    }
}
