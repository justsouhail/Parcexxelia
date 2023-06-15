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
            Schema::create('model', function (Blueprint $table) {
                $table->increments('id');
                $table->string('Model_Nom')->nullable();;
                $table->integer('categorie_id')->unsigned()->nullable();

                $table->foreign('categorie_id')->references('id')->on('categorie');
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model');
    }
};
