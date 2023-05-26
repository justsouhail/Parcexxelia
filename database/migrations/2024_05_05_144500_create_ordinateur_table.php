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
        Schema::create('ordinateur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('N°_de_serie')->nullable();
            $table->float('Cout')->nullable();
            $table->date('Date_Achat')->nullable();
            $table->float('RAM')->nullable();;
            $table->float('Stockage')->nullable();;
            $table->string('Nom')->nullable();;
            $table->string('Addresse_MAC')->nullable();;
            $table->string('Addresse_IP')->nullable();;
            $table->integer('Nb_Moniteur')->nullable();;
            $table->string('Commentaire')->nullable();
            $table->integer('model_id')->unsigned()->nullable();
            $table->integer('processeur_id')->unsigned()->nullable();;
            $table->integer('os_id')->unsigned()->nullable();;
            $table->integer('type_id')->unsigned()->nullable();;
            $table->integer('role_id')->unsigned()->nullable();;
            $table->integer('marque_id')->unsigned()->nullable();;
            $table->integer('post_id')->unsigned()->nullable();
            $table->integer('categorie_id')->unsigned()->nullable();
            $table->softDeletes();



            
            
            $table->foreign('model_id')->references('id')->on('model');
            $table->foreign('processeur_id')->references('id')->on('processeur');
            $table->foreign('os_id')->references('id')->on('os');
            $table->foreign('type_id')->references('id')->on('type');
            $table->foreign('role_id')->references('id')->on('role');
            $table->foreign('marque_id')->references('id')->on('marque');
            $table->foreign('post_id')->references('id')->on('post');
            $table->foreign('categorie_id')->references('id')->on('categorie');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ordinateur');
    }
};
