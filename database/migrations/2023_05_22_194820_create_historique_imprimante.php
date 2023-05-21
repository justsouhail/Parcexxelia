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
        Schema::create('historique_imprimante', function (Blueprint $table) {
            $table->integer('imprimante_id')->unsigned()->nullable();
            $table->integer('employes_id')->unsigned()->nullable();
            $table->date('date_affectation')->nullable();

            $table->foreign('imprimante_id')->references('id')->on('imprimante')

            ->onDelete('cascade');
    
            
        $table->foreign('employes_id')->references('id')->on('employes')
    
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_imprimante');
    }
};
