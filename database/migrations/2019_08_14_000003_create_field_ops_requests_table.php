<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldOpsRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('field_ops_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('device')->nullable();
            $table->string('fault_reason');
            $table->longText('fault_description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
