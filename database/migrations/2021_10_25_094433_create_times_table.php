<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('times', function (Blueprint $table) {
            $table->id();
            $table->string('school_id')->nullable();
            $table->string('class_id');
            $table->string('medium_id');
            $table->string('section_id');
            $table->string('timeslot_id');
            $table->string('subject_id');
            $table->string('day');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('times');
    }
}
