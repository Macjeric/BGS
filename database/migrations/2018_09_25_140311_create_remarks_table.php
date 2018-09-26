<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('remarks', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index(); 
            $table->integer('budget_id')->unsigned()->index()->references('budget_id')->on('budget')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('actual_cost')->default('0');
            $table->date('expected_action_date');
            $table->date('push_forward_date')->nullable();
            $table->string('remarks');
            $table->string('final_remarks')->nullable();
            $table->string('reason')->nullable();
            $table->string('reviewer')->nullable();
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
        Schema::drop('remarks');
    }
}
