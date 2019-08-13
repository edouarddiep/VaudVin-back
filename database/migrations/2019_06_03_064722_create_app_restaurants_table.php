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
            $table->increments('res_id');
            $table->string('res_name', 191);
            $table->string('res_type', 191);
            $table->string('res_address_1', 191);
            $table->string('res_address_2', 191)->nullable();
            $table->string('res_address_3', 191)->nullable();
            $table->string('res_zip_code', 191);
            $table->string('res_city', 191);
            $table->string('res_country', 191);
            $table->string('res_phone_number', 191);

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
