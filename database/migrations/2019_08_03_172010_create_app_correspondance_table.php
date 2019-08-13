<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppCorrespondanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_correspondance', function (Blueprint $table) {
            $table->increments('cor_id');

            // Foreign Keys - Rates 1
            $table->integer('fk_cor_first_rat_id')->unsigned();
            $table->foreign('fk_cor_first_rat_id')->references('rat_id')->on('app_rates');

            // Foreign Keys - Rates 2
            $table->integer('fk_cor_second_rat_id')->unsigned();
            $table->foreign('fk_cor_second_rat_id')->references('rat_id')->on('app_rates');

            $table->tinyInteger('cor_is_rate_similar'); // Le rapport entre first_rate et second_rate est de + ou - 1 d'écart

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
        Schema::dropIfExists('app_correspondance');
    }
}
