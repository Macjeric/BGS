<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('updates', function (Blueprint $table) {
            $table->increments('updates_id')->unsigned()->index();
            $table->integer('budget_id')->unsigned()->index()->references('budget_id')->on('budget')->onUpdate('cascade')->onDelete('restrict');
            $table->integer('user_id')->unsigned()->index();
            $table->string('comment')->nullable();
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
       Schema::drop('updates'); 
    }
    
}
