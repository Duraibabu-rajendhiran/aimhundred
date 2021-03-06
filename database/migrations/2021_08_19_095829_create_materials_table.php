<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('board_id');
            $table->string('medium_id');
            $table->string('lesson_id');
            $table->string('class_id');
            $table->string('subject_id');
            $table->string('file_type');
            $table->string('file_name');
            $table->string('is_delete')->default(0);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('materials');
        
    }
}
