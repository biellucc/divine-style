<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Juridico>
 */
class JuridicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nomeEmpresarial' => $this->faker->company(),
            'cnpj' => $this->faker->randomNumber(9, true),
            'usuario_id' => User::pluck('id')->random()
        ];
    }
}
