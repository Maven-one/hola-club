<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Update1565640596674OutletsTable extends Migration
{
    public function up()
    {
        Schema::table('outlets', function (Blueprint $table) {
            $table->string('gps')->nullable();
            $table->string('w_3_w')->nullable();
            $table->string('area')->nullable();
            $table->string('province')->nullable();
        });
    }

    public function down()
    {
        Schema::table('outlets', function (Blueprint $table) {
        });
    }
}
