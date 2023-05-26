<?php

namespace Database\Factories;

use App\Models\Marque;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mobile>
 */
class MobileFactory extends Factory
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
            'marque_id' => Marque::factory(),
            'model_id' => Model::factory(),
            'Os' => $this->faker->randomElement(['Android', 'iOS']),
            'Stockage' => $this->faker->randomFloat(2, 8, 256),
            'taille_ecran' => $this->faker->randomElement(['5.5 inch', '6.2 inch', '6.7 inch']),
            'is_smartphone' => $this->faker->boolean(),
            'is_tablet' => $this->faker->boolean(),
            'date_achat' => $this->faker->date(),
            'Cout' => $this->faker->randomFloat(2, 100, 1000),
            // You can add more fields here as needed
        ];
    }
}
