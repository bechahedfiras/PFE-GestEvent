<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('faculte_id')->nullable();
            $table->string('name');
            $table->bigInteger('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->Integer('postcode')->nullable();
            $table->string('state')->nullable();
            $table->string('profile_pic')->nullable()->default('../template/images/userprofilepicture.png');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('emailConfirmed')->default('false');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}