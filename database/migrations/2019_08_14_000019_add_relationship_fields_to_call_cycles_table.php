<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCallCyclesTable extends Migration
{
    public function up()
    {
        Schema::table('call_cycles', function (Blueprint $table) {
            $table->unsignedInteger('outlet_id');
            $table->foreign('outlet_id', 'outlet_fk_239515')->references('id')->on('outlets');
            $table->unsignedInteger('csr_role_id');
            $table->foreign('csr_role_id', 'csr_role_fk_239528')->references('id')->on('roles');
            $table->unsignedInteger('csr_user_id');
            $table->foreign('csr_user_id', 'csr_user_fk_239529')->references('id')->on('users');
        });
    }
}
