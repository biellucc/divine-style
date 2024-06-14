<?php

namespace Database\Factories;

use App\Models\Carrinho;
use App\Models\Cartao;
use App\Models\Fisico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'valor' => $this->faker->randomFloat(2,1, 9999),
            'status' =>  $this->faker->randomElement(['Entregue', 'Em avaliação', 'Em trânsito']),
            'fisico_id' => Fisico::pluck('id')->random(),
            'cartao_id' => Cartao::pluck('id')->random(),
            'carrinho_id' => Carrinho::pluck('id')->random()
        ];
    }
}
