<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('balance', function (Blueprint $table) {
            $table->increments('balance_id')->unsigned()->index();
            $table->integer('budget_id')->unsigned()->index()->references('budget_id')->on('budget')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('total_cost')->default('0');
            $table->integer('actual_cost')->default('0');
            $table->integer('resultant_balance')->default('0');
            $table->string('status')->default('Created');
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
         Schema::drop('balance');
    }
}
