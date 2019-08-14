<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAuditsTable extends Migration
{
    public function up()
    {
        Schema::table('audits', function (Blueprint $table) {
            $table->unsignedInteger('outlet_id');
            $table->foreign('outlet_id', 'outlet_fk_239105')->references('id')->on('outlets');
        });
    }
}
