<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
          $table->increments('id');
          $table->integer('user_id')->unsigned();
          $table->integer('question_id')->nullable()->unsigned();
          $table->integer('answer_id')->nullable()->unsigned();
          $table->integer('vote');
          $table->timestamps();
      //    $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
      //    $table->foreign('question_id')->references('id')->on('questions')->onUpdate('cascade')->onDelete('cascade');
      //    $table->foreign('answer_id')->references('id')->on('answers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
