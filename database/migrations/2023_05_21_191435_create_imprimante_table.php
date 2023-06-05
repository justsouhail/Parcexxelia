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
        Schema::create('imprimante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('N°_de_serie')->nullable();
            $table->string('Addresse_IP')->nullable();
            $table->string('Login')->nullable();
            $table->string('mdp')->nullable();
            $table->string('Status')->nullable();
            $table->float('Cout')->nullable();
            $table->date('Date_Achat')->nullable();
            $table->string('type_Connextion')->nullable();
            $table->float('Nb_cartouche')->nullable();
            $table->boolean('Couleur')->nullable();
            $table->boolean('is_scanner')->nullable();
            $table->integer('marque_id')->unsigned()->nullable();;
            $table->integer('model_id')->unsigned()->nullable();;
            $table->integer('categorie_id')->unsigned()->nullable()->default(2);

            $table->softDeletes();

            $table->foreign('marque_id')->references('id')->on('marque');
            $table->foreign('categorie_id')->references('id')->on('categorie');
            $table->foreign('model_id')->references('id')->on('model');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imprimante');
    }
};
