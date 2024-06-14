<?php

namespace Database\Factories;

use App\Models\Fisico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carrinho>
 */
class CarrinhoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' =>  $this->faker->boolean(),
            'fisico_id' => Fisico::pluck('id')->random()
        ];
    }
}
