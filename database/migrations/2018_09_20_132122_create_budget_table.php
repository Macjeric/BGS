<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('budget', function (Blueprint $table) {
            $table->increments('budget_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index()->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
            $table->string('month');
            $table->string('place');
            $table->integer('quarter');
            $table->integer('market_cost');
            $table->integer('travelling_cost');
            $table->integer('fuel_cost');
            $table->integer('postage_cost');
            $table->integer('fax_cost');
            $table->string('budget_status');
            $table->string('business_status');
            $table->string('description');
            $table->integer('expected_premium');
            $table->integer('carry_over_balance')->default('0');
            $table->string('first_approval');
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
