<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 191);
            $table->string('type', 191);
            $table->string('address_1', 191);
            $table->string('address_2', 191)->nullable();
            $table->string('address_3', 191)->nullable();
            $table->string('zip_code', 191);
            $table->string('city', 191);
            $table->string('country', 191);
            $table->string('phone_number', 191);

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
        Schema::dropIfExists('app_restaurants');
    }
}
