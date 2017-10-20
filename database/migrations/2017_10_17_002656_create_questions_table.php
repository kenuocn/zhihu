<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title','128');
            $table->text('body');
            $table->integer('user_id')->unsignd();
            $table->integer('comments_count')->unsignd()->default(0);
            $table->integer('followers_count')->unsignd()->default(1);
            $table->integer('answers_count')->unsignd()->default(0);
            $table->string('close_count',8)->default('false');
            $table->string('is_hidden',8)->default('false');
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
        Schema::dropIfExists('questions');
    }
}
