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

    
    
  
        Schema::create('employes', function (Blueprint $table) {
          $table->increments('id');

            $table->string('Nom')->nullable();
            $table->string('Prenom')->nullable();
            $table->string('Matricule')->nullable();
            $table->string('Sage')->nullable();
            $table->string('commun')->nullable();
            $table->string('drive')->nullable();
            $table->unsignedInteger('service_id')->nullable();
            $table->softDeletes();
            $table->foreign('service_id')->references('id')->on('services')->nullable();
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employes');
    }
};
