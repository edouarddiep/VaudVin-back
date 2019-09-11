<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppConcoursRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_concours_rates', function (Blueprint $table) {
            $table->increments('con_rat_id');
            $table->integer('con_rat_value'); // points concours allant de 0 à 100

            // Foreign Keys - Vintages
            $table->integer('fk_con_rat_vin_id')->unsigned();
            $table->foreign('fk_con_rat_vin_id')->references('vin_id')->on('app_vintages');

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
        Schema::dropIfExists('app_concours_rates');
    }
}
