<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value'); // notes de 1 à 5

            // Foreign Keys - Vintages
            $table->integer('vint_id')->unsigned();
            $table->foreign('vint_id')->references('id')->on('app_vintages');
            
            // Foreign Keys - Users
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('app_rates');
    }
}
