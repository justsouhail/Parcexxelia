<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Marque;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Imprimante>
 */
class ImprimanteFactory extends Factory
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
            'Addresse_IP' => $this->faker->ipv4,
            'Login' => $this->faker->userName,
            'mdp' => $this->faker->password,
            'Status' => $this->faker->randomElement(['Active', 'Inactive']),
            'Cout' => $this->faker->randomFloat(2, 100, 1000),
            'Date_Achat' => $this->faker->date(),
            'type_Connextion' => $this->faker->word,
            'Nb_cartouche' => $this->faker->randomFloat(2, 1, 10),
            'Couleur' => $this->faker->boolean,
            'marque_id' => Marque::factory(),
            'model_id' => Model::factory(),
            'categorie_id' => Categorie::factory(),
        ];
    }
}
