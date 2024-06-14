<?php

namespace Database\Factories;

use App\Models\Carrinho;
use App\Models\Roupa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CarrinhoRoupaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'carrinho_id' => Carrinho::pluck('id')->random(),
            'roupa_id' => Roupa::pluck('id')->random()
        ];
    }
}
