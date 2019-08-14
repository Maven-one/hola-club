<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletsTable extends Migration
{
    public function up()
    {
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
            $table->string('gps')->nullable();
            $table->string('w_3_w')->nullable();
            $table->string('area')->nullable();
            $table->string('province')->nullable();
            $table->string('rebate_option')->nullable();
            $table->string('account_number')->nullable();
            $table->decimal('balance', 15, 2)->nullable();
            $table->integer('baskets_this_month')->nullable();
            $table->integer('baskets_last_90_days')->nullable();
            $table->integer('baskets_last_2_weeks')->nullable();
            $table->integer('qty_last_2_weeks')->nullable();
            $table->integer('no_of_active_shoppers_this_month')->nullable();
            $table->integer('no_of_active_shoppers_last_2_weeks')->nullable();
            $table->integer('no_of_active_shoppers_all_time')->nullable();
            $table->integer('no_of_unique_taps_this_month')->nullable();
            $table->integer('no_of_unique_taps_last_2_weeks')->nullable();
            $table->integer('caselot_performance')->nullable();
            $table->longText('how_do_i_improve_this_outlet')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
