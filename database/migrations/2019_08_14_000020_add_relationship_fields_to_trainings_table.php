<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTrainingsTable extends Migration
{
    public function up()
    {
        Schema::table('trainings', function (Blueprint $table) {
            $table->unsignedInteger('outlet_id')->nullable();
            $table->foreign('outlet_id', 'outlet_fk_238978')->references('id')->on('outlets');
        });
    }
}
