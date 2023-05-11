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
            $table->increments('id');
            $table->string('Moniteur_Nom');
            $table->string('resolution');
            $table->float('refresh_rate');
            $table->string('marque_moniteur');
            $table->integer('ordinateur_id')->unsigned()->nullable();


            $table->foreign('ordinateur_id')->references('id')->on('ordinateur')->nullable();

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

