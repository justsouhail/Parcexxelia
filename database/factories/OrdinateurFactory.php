<?php

namespace Database\Factories;

use App\Models\Categorie;
use App\Models\Marque;
use App\Models\Os;
use App\Models\Post;
use App\Models\Processeur;
use App\Models\Role;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ordinateur>
 */
class OrdinateurFactory extends Factory
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
            'Cout' => $this->faker->randomFloat(2, 100, 1000),
            'Date_Achat' => $this->faker->date(),
            'RAM' => $this->faker->randomFloat(2, 4, 16),
            'Stockage' => $this->faker->randomFloat(2, 128, 512),
            'Nom' => $this->faker->word,
            'Addresse_MAC' => $this->faker->macAddress,
            'Addresse_IP' => $this->faker->ipv4,
            'Nb_Moniteur' => $this->faker->numberBetween(1, 3),
            'Commentaire' => $this->faker->sentence,
            'model_id' => Model::factory(),
            'processeur_id' => Processeur::factory(),
            'os_id' => Os::factory(),
            'type_id' => Type::factory(),
            'role_id' => Role::factory(),
            'marque_id' => Marque::factory(),
            'post_id' => Post::factory(),
            'categorie_id' => Categorie::factory(),
        ];
    }
}
