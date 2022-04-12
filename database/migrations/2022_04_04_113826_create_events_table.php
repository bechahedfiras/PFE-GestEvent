<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('label');
            $table->string('price');
            $table->string('lieux');
            $table->string('description');
            $table->string('photo')->nullable();
            $table->timestamps();
//relation subevent  and event
            $table->bigInteger('subevent_id')->unsigned();
            $table->Foreign('subevent_id')->references('id')->on('subevents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
