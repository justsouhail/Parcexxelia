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
        Schema::create('logiciel__ordinateur', function (Blueprint $table) {
            $table->integer('ordinateur_id')->unsigned();
            $table->integer('logiciel_id')->unsigned();
            
            $table->foreign('ordinateur_id')->references('id')->on('ordinateur')

            ->onDelete('cascade');
    
        $table->foreign('logiciel_id')->references('id')->on('logiciel')
    
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logiciel__ordinateur');
    }
};
