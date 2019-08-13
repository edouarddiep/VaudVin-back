<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppVintagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_vintages', function (Blueprint $table) {
            $table->increments('vin_id');
            $table->integer('vin_year'); // année du millésime

            // Foreign Keys - Wines
            $table->integer('fk_vin_win_id')->unsigned();
            $table->foreign('fk_vin_win_id')->references('win_id')->on('app_wines');
            
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
        Schema::dropIfExists('app_vintages');
    }
}
