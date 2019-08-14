<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCallCyclesTable extends Migration
{
    public function up()
    {
        Schema::create('call_cycles', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('scheduled_visit_date_time');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
