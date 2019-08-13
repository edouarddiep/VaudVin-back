<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppWineCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_wine_cards', function (Blueprint $table) {
            $table->increments('win_car_id');
            
            // Foreign Keys - Restaurants
            $table->integer('fk_win_car_res_id')->unsigned();
            $table->foreign('fk_win_car_res_id')->references('res_id')->on('app_restaurants');
            // Foreign Keys - Wines
            $table->integer('fk_win_car_win_id')->unsigned();
            $table->foreign('fk_win_car_win_id')->references('win_id')->on('app_wines');

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
        Schema::dropIfExists('app_wine_cards');
    }
}
