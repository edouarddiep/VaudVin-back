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
            $table->increments('id');
            
            // Foreign Keys - Restaurants
            $table->integer('res_id')->unsigned();
            $table->foreign('res_id')->references('id')->on('app_restaurants');
            // Foreign Keys - Wines
            $table->integer('wine_id')->unsigned();
            $table->foreign('wine_id')->references('id')->on('app_wines');

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
