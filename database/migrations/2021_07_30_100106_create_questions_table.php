<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->text('title')->nullable()->default('q');
            $table->string('option_1')->nullable()->default('q');
            $table->string('option_2')->nullable()->default('q');
            $table->string('option_3')->nullable()->default('q');
            $table->string('option_4')->nullable()->default('q');
            $table->string('answer')->nullable()->default('q');
            $table->string('board_id');
            $table->string('subject_id');
            $table->string('lesson_id');
            $table->string('medium_id'); 
            $table->string('class_id');
            $table->string('academic_id');
            $table->string('is_delete')->default(0);
            $table->string('question_image')->nullable()->default(',');
            $table->string('option_image_1')->nullable()->default(',');
            $table->string('option_image_2')->nullable()->default(',');
            $table->string('option_image_3')->nullable()->default(',');
            $table->string('option_image_4')->nullable()->default(',');
            $table->string('answer_image')->nullable()->default(',');
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
