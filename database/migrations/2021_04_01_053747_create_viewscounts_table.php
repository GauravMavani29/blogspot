<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewscounts', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->bigInteger('post_id')->unsigned();
            $table->string('viewdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('viewscounts');
    }
}
