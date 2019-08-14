<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOutletsTable extends Migration
{
    public function up()
    {
        Schema::table('outlets', function (Blueprint $table) {
            $table->unsignedInteger('css_role_id');
            $table->foreign('css_role_id', 'css_role_fk_238950')->references('id')->on('roles');
            $table->unsignedInteger('css_user_id');
            $table->foreign('css_user_id', 'css_user_fk_238951')->references('id')->on('users');
            $table->unsignedInteger('csr_role_id');
            $table->foreign('csr_role_id', 'csr_role_fk_238952')->references('id')->on('roles');
            $table->unsignedInteger('csr_user_id')->nullable();
            $table->foreign('csr_user_id', 'csr_user_fk_238953')->references('id')->on('users');
            $table->unsignedInteger('field_ops_role_id')->nullable();
            $table->foreign('field_ops_role_id', 'field_ops_role_fk_238954')->references('id')->on('roles');
            $table->unsignedInteger('field_ops_user_id');
            $table->foreign('field_ops_user_id', 'field_ops_user_fk_238955')->references('id')->on('users');
            $table->unsignedInteger('owner_role_id')->nullable();
            $table->foreign('owner_role_id', 'owner_role_fk_238972')->references('id')->on('roles');
            $table->unsignedInteger('owner_user_id')->nullable();
            $table->foreign('owner_user_id', 'owner_user_fk_238973')->references('id')->on('users');
            $table->unsignedInteger('heineken_rep_role_id')->nullable();
            $table->foreign('heineken_rep_role_id', 'heineken_rep_role_fk_238974')->references('id')->on('roles');
            $table->unsignedInteger('heineken_rep_user_id')->nullable();
            $table->foreign('heineken_rep_user_id', 'heineken_rep_user_fk_238975')->references('id')->on('users');
        });
    }
}
