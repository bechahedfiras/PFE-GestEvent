<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventorgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventorgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            //relation organisateursevents  and event
            $table->bigInteger('event_id')->unsigned();
            $table->Foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            ;
             //relation organisateursevents  and user
           $table->bigInteger('user_id')->unsigned();
           $table->Foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('eventorgs');
    }
}
