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
            $table->increments('rat_id');
            $table->integer('rat_value'); // notes de 1 à 5
            $table->string('rat_comment', 100)->nullable(); // commentaire facultatif (max. 100 caractères)

            // Foreign Keys - Vintages
            $table->integer('fk_rat_vin_id')->unsigned();
            $table->foreign('fk_rat_vin_id')->references('vin_id')->on('app_vintages');
            
            // Foreign Keys - Users
            $table->integer('fk_rat_user_id')->unsigned();
            $table->foreign('fk_rat_user_id')->references('id')->on('users');

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
