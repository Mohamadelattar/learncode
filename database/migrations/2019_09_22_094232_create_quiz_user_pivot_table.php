<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizUserPivotTable extends Migration
{

    public function up()
    {
        Schema::create('quiz_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('quiz_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quiz_user');
    }
}
