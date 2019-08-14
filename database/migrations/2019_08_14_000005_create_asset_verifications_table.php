<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetVerificationsTable extends Migration
{
    public function up()
    {
        Schema::create('asset_verifications', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('t_1_mini_1');
            $table->string('t_1_mini_2');
            $table->string('till_drawer');
            $table->string('scanner');
            $table->string('ups');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
