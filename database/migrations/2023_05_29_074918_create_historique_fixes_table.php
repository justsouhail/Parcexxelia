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
        Schema::create('historique_fixes', function (Blueprint $table) {
            $table->integer('tel_fixe_id')->unsigned()->nullable();
            $table->integer('employes_id')->unsigned()->nullable();
            $table->date('date_affectation')->nullable();

            $table->foreign('tel_fixe_id')->references('id')->on('tel_fixes')

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
        Schema::dropIfExists('historique_fixes');
    }
};
