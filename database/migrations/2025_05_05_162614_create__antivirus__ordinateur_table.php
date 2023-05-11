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
        Schema::create('_antivirus__ordinateur', function (Blueprint $table) {
            $table->integer('ordinateur_id')->unsigned()->nullable();
            $table->integer('antivirus_id')->unsigned()->nullable();
            
            $table->foreign('ordinateur_id')->references('id')->on('ordinateur')

            ->onDelete('cascade');
    
        $table->foreign('antivirus_id')->references('id')->on('antivirus')
    
            ->onDelete('cascade');


            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_antivirus__ordinateur');
    }
};
