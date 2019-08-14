<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFieldOpsRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('field_ops_requests', function (Blueprint $table) {
            $table->unsignedInteger('outlet_id');
            $table->foreign('outlet_id', 'outlet_fk_239129')->references('id')->on('outlets');
        });
    }
}
