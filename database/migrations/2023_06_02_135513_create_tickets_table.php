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
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('N°_de_serie')->nullable();
            $table->string('Addresse_IP')->nullable();

            
            $table->integer('model_id')->unsigned()->nullable();
            $table->integer('marque_id')->unsigned()->nullable();;
            $table->integer('categorie_id')->unsigned()->nullable()->default(7);
            $table->softDeletes();
            
            $table->foreign('model_id')->references('id')->on('model');
            $table->foreign('marque_id')->references('id')->on('marque');
            $table->foreign('categorie_id')->references('id')->on('categorie');   
                     $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
