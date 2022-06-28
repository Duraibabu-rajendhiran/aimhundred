<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('class');
            $table->string('board');
            $table->string('no_of_question_sub');
            $table->string('time_per_question');
            $table->string('start_time');
            $table->string('is_deleted')->default(0);
            $table->timestamps();
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
