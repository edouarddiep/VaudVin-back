<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppCorrespondancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_correspondances', function (Blueprint $table) {
            $table->increments('cor_id');

            // Foreign Keys - Vintages
            $table->integer('fk_cor_vin_id')->unsigned();
            $table->foreign('fk_cor_vin_id')->references('vin_id')->on('app_vintages');

            // Foreign Keys - First rate
            $table->integer('fk_cor_first_rat_id')->unsigned();
            $table->foreign('fk_cor_first_rat_id')->references('rat_id')->on('app_rates');

            // Foreign Keys - Second rate
            $table->integer('fk_cor_second_rat_id')->unsigned();
            $table->foreign('fk_cor_second_rat_id')->references('rat_id')->on('app_rates');

            // Foreign Keys - First user
            $table->integer('fk_cor_first_user_id')->unsigned();
            $table->foreign('fk_cor_first_user_id')->references('id')->on('users');

            // Foreign Keys - Second user
            $table->integer('fk_cor_second_user_id')->unsigned();
            $table->foreign('fk_cor_second_user_id')->references('id')->on('users');

            // champ indiquant si la note est + ou - 1 d'écart entre first rate et second rate
            $table->tinyInteger('cor_is_rate_similar');

            // Timestamps of creation & updates
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_correspondances');
    }
}
