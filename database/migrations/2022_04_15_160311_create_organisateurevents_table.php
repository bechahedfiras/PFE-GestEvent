<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganisateureventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisateursevents', function (Blueprint $table) {
            $table->bigIncrements('id');
             //relation organisateursevents  and event
             $table->bigInteger('event_id')->unsigned();
             $table->Foreign('event_id')->references('id')->on('events');
              //relation organisateursevents  and user
            $table->bigInteger('user_id')->unsigned();
            $table->Foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('organisateursevents');
    }
}
