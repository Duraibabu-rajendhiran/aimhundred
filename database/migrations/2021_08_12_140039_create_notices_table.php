<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('notices', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('valid');
            $table->string('school_id');
            $table->string('board_id');
            $table->timestamps();
        });

    }

    public function down()
    {

        Schema::dropIfExists('notices');
        
    }
}
