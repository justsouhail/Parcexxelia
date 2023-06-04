<?php

namespace Database\Factories;

use App\Models\Marque;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reseau>
 */
class ReaseauFactory extends Factory
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
            'Nom' => $this->faker->randomElement(['qwwe', '9asa718', '0asa85']),
            'Addresse_MAC' => $this->faker->randomElement(['qwwe', '9asa718', '0asa85']),
            'Localisation' => $this->faker->randomElement(['qwwe', '9asa718', '0asa85']),
            'Conf_Details' => $this->faker->randomElement(['qwwe', '9asa718', '0asa85']),

           

            
           
        ];
    }
}
