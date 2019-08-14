<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingModulesTable extends Migration
{
    public function up()
    {
        Schema::create('training_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('order')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
