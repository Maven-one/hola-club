<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetVerificationsTable extends Migration
{
    public function up()
    {
        Schema::table('asset_verifications', function (Blueprint $table) {
            $table->unsignedInteger('outlet_id');
            $table->foreign('outlet_id', 'outlet_fk_239127')->references('id')->on('outlets');
        });
    }
}
