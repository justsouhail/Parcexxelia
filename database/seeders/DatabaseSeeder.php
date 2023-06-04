<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Employes;
use App\Models\Imprimante;
use App\Models\Mobile;
use App\Models\Ordinateur;
use App\Models\Reseau;
use App\Models\Tel_fixe;
use App\Models\ticket;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Employes::factory(10)->create();
        Mobile::factory(10)->create();
        Ordinateur::factory(10)->create();

        Mobile::factory(10)->create();

        Imprimante::factory(10)->create();
        Tel_fixe::factory(10)->create();
        Reseau::factory(10)->create();
        ticket::factory(10)->create();


    }
}
