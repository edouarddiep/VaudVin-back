<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppWinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_wines', function (Blueprint $table) {
            $table->increments('win_id');
            $table->string('win_region', 191); // provenance
            $table->string('win_name', 191); // nom
            $table->string('win_producer', 191); // producteur
            $table->string('win_appellation', 191); // par rapport à AOC
            $table->string('win_grape_variety', 191); // cépage
            $table->string('win_category', 191); // type de vin : blanc, rouge, mousseux, etc.
            $table->string('win_style', 191); // grand sec, fruité et gouleyant, etc.
            $table->string('win_served_with', 191); // accords mets-vins
            $table->decimal('win_sugar_level',4,2); // taux de sucre
            $table->decimal('win_total_acidity',4,2); // acidité
            $table->decimal('win_alcohol_level',4,2); // degré d'alcool
            $table->tinyInteger('win_is_bio'); // est bio à afficher
            $table->tinyInteger('win_is_woody_character'); // est boisé à afficher
            $table->tinyInteger('win_is_assembled'); // à conserver mais ne pas afficher
            $table->decimal('win_capacity',8,2); // capacité du vin en décilitres

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
        Schema::dropIfExists('app_wines');
    }
}
