<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('start_time')->nullable();
            $table->time('end_time');
            $table->string('person_trained');
            $table->longText('feedback')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
