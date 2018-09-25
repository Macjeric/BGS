<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
         {
            Schema::create('approvals', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->integer('approving_user_id')->unsigned()->index()->default('0')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict'); //no r
            $table->integer('budget_id')->unsigned()->index()->references('budget_id')->on('budget')->onUpdate('cascade')->onDelete('restrict');
            $table->string('category');
            $table->string('status')->default('Pending');
            $table->string('comment')->default('Pending');
            $table->string('forward_to')->nullable();
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
         Schema::drop('approvals');
    }
}
