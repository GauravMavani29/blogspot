<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('user_id')->foreign('user_id')->references('id')->on('users');
            $table->string('username');
            $table->string('fullname');
            $table->string('profile');
            $table->string('email');
            $table->bigInteger('mno');
            $table->string('address');
            $table->string('bdate');
            $table->string('github');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('facebook');
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
        Schema::dropIfExists('profiles');
    }
}
