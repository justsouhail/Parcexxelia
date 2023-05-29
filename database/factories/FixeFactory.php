<?php

namespace Database\Factories;

use App\Models\Marque;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tel_fixe>
 */
class FixeFactory extends Factory
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
            'astreinte' => $this->faker->randomElement(['111', '9718', '085']),
            'Date_Installation' => $this->faker->date(),
            'Commentaire' => $this->faker->randomElement(['Active', 'Inactive']),
            'Addresse_IP' => $this->faker->randomElement(['11', '111.111.111.111']),

            
            'date_achat' => $this->faker->date(),
            'Cout' => $this->faker->randomFloat(2, 100, 1000),
        ];
    }
}
