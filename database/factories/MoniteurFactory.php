<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Ordinateur;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Moniteur>
 */
class MoniteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'N°_de_serie' => $this->faker->unique()->randomNumber(),
            'resolution' => $this->faker->randomElement(['1920x1080', '2560x1440', '3840x2160']),
            'Cout' => $this->faker->randomFloat(2, 100, 1000),
            'Data_achat' => $this->faker->date(),
            'ordinateur_id' => Ordinateur::factory(),
            'categorie_id' => Categorie::factory(),
            'marque_id' => Marque::factory(),
            'model_id' => Model::factory(),        ];
    }
}
