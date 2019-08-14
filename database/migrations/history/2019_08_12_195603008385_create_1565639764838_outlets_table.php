<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Create1565639764838OutletsTable extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('outlets')) {
            Schema::create('outlets', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('id_external');
                $table->string('sitecode');
                $table->string('site_name');
                $table->string('correct_outlet_name')->nullable();
                $table->date('installation_date');
                $table->string('wave')->nullable();
                $table->string('status');
                $table->longText('outlet_feedback')->nullable();
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('outlets');
    }
}
