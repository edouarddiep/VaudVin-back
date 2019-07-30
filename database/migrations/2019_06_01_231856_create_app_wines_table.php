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
            $table->increments('id');
            $table->string('region', 191); // provenance
            $table->string('name', 191); // nom
            $table->string('producer', 191); // producteur
            $table->string('appellation', 191); // par rapport à AOC
            $table->string('grape_variety', 191); // cépage
            $table->string('category', 191); // type de vin : blanc, rouge, mousseux, etc.
            $table->string('style', 191); // grand sec, fruité et gouleyant, etc.
            $table->string('served_with', 191); // accords mets-vins
            $table->decimal('sugar_level',4,2); // taux de sucre
            $table->decimal('total_acidity',4,2); // acidité
            $table->decimal('alcohol_level',4,2); // degré d'alcool
            $table->decimal('selling_price',10,2); // prix de vente
            $table->tinyInteger('is_bio'); // est bio à afficher
            $table->tinyInteger('is_woody_character'); // est boisé à afficher
            $table->tinyInteger('is_assembled'); // à conserver mais ne pas afficher
            $table->decimal('capacity',8,2); // capacité du vin en décilitres

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
