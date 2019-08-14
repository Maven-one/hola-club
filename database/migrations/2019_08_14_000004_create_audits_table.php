<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditsTable extends Migration
{
    public function up()
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('at_least_2_spare_till_rolls');
            $table->string('more_than_20_hola_club_cards_available')->nullable();
            $table->string('kazang_poster_visible');
            $table->string('promo_poster_visible')->nullable();
            $table->string('hola_club_poster_available')->nullable();
            $table->string('promotions_displayed_on_device')->nullable();
            $table->string('wholesaler_1')->nullable();
            $table->string('wholesaler_2')->nullable();
            $table->string('wholesaler_3')->nullable();
            $table->string('device_in_correct_position')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
