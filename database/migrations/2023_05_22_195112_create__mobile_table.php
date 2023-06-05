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
        Schema::create('mobile', function (Blueprint $table) {
            $table->increments('id')->nullable();
            $table->string('N°_de_serie')->nullable();
            $table->integer('marque_id')->unsigned()->nullable();;
            $table->integer('model_id')->unsigned()->nullable();
            $table->string('Os')->nullable();
            $table->float('Stockage')->nullable();
            $table->string('taille_ecran')->nullable();
            $table->boolean('is_smartphone')->nullable();
            $table->boolean('is_tablet')->nullable();
            $table->date('data_achat')->nullable();
            $table->integer('categorie_id')->unsigned()->nullable()->default(4);

            $table->float('Cout')->nullable();
            $table->softDeletes();

            $table->foreign('categorie_id')->references('id')->on('categorie')->nullable();;
            $table->foreign('marque_id')->references('id')->on('marque')->nullable();;
            $table->foreign('model_id')->references('id')->on('model')->nullable();;

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile');
    }
};
