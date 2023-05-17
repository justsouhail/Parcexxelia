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
            $table->string('N°_de_serie');
            $table->float('Cout')->nullable();
            $table->date('Date_Achat')->nullable();
            $table->float('RAM');
            $table->float('Stockage');
            $table->string('Nom');
            $table->string('Addresse_MAC');
            $table->string('Addresse_IP');
            $table->integer('Nb_Moniteur');
            $table->string('Status')->nullable();
            $table->integer('service_id')->unsigned()->nullable();;
            $table->integer('model_id')->unsigned();
            $table->integer('processeur_id')->unsigned();
            $table->integer('os_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->integer('role_id')->unsigned();
            $table->integer('marque_id')->unsigned();
            $table->integer('post_id')->unsigned();



            
            
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('model_id')->references('id')->on('model');
            $table->foreign('processeur_id')->references('id')->on('processeur');
            $table->foreign('os_id')->references('id')->on('os');
            $table->foreign('type_id')->references('id')->on('type');
            $table->foreign('role_id')->references('id')->on('role');
            $table->foreign('marque_id')->references('id')->on('marque');
            $table->foreign('post_id')->references('id')->on('post');

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
