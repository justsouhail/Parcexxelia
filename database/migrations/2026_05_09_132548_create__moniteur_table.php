<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('moniteur', function (Blueprint $table) {
            $table->increments('id')->nullable();;
            $table->string('N°_de_serie')->nullable();;
            $table->string('resolution')->nullable();;
            $table->float('Cout')->nullable();;
            $table->string('Data_achat')->nullable();
            $table->integer('ordinateur_id')->unsigned()->nullable();
            $table->integer('categorie_id')->unsigned()->nullable()->default(3);
            $table->integer('marque_id')->unsigned()->nullable();;
            $table->integer('model_id')->unsigned()->nullable();
            $table->softDeletes();


            $table->foreign('ordinateur_id')->references('id')->on('ordinateur')->nullable();
            $table->foreign('marque_id')->references('id')->on('marque')->nullable();;
            $table->foreign('categorie_id')->references('id')->on('categorie')->nullable();;
            $table->foreign('model_id')->references('id')->on('model')->nullable();;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moniteur');
    }
};

