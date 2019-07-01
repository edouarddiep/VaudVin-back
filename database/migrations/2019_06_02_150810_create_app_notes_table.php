<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_notes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value');

            // Foreign Keys - Wines
            $table->integer('wine_id')->unsigned();
            $table->foreign('wine_id')->references('id')->on('app_wines');
            
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
        Schema::dropIfExists('app_notes');
    }
}
