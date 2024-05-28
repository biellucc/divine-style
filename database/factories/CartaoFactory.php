<?php

namespace Database\Factories;

use App\Models\Fisico;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cartao>
 */
class CartaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numero' => $this->faker->creditCardNumber(null, true, '.'),
            'cvc' => $this->faker->randomNumber(4, true),
            'tipo' => $this->faker->creditCardType(),
            'validade' =>$this->faker->creditCardExpirationDate(),
            'fisico_id' => Fisico::pluck('id')->random()
        ];
    }
}
