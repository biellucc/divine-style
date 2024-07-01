<?php

namespace Database\Factories;

use App\Models\Juridico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Roupa>
 */
class RoupaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'juridico_id' => Juridico::pluck('id')->random(),
            'tipo' => $this->faker->randomElement(['Camisa de manga longa', 'Camisa de manga curta', 'Camiseta', 'Shorts', 'Bermuda', 'Vestido', 'Macacão']),
            'cor' => $this->faker->colorName(),
            'tamanho' => $this->faker->randomElement(['P', 'M', 'G','G1', 'G2', 'G3', 'G4']),
            'descricao' => $this->faker->text(90),
            'preco' => $this->faker->randomFloat(2, 1, 1000),
            'estoque' => $this->faker->numberBetween(1, 1000),
            'imagem' => $this->faker->imageUrl(),
            'status' => $this->faker->boolean()
        ];
    }
}
