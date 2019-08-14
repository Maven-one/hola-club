<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingTrainingModulePivotTable extends Migration
{
    public function up()
    {
        Schema::create('training_training_module', function (Blueprint $table) {
            $table->unsignedInteger('training_id');
            $table->foreign('training_id', 'training_id_fk_239056')->references('id')->on('trainings');
            $table->unsignedInteger('training_module_id');
            $table->foreign('training_module_id', 'training_module_id_fk_239056')->references('id')->on('training_modules');
        });
    }
}
