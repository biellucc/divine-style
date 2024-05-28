<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FisicoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->firstName('male'|'female'),
            'sobrenome' => $this->faker->lastName('male'|'female'),
            'cpf' => $this->faker->randomNumber(9, true),
            'genero' => $this->faker->randomElement(['masculino', 'feminino']),
            'data_nascimento' => $this->faker->date('Y-m-d', 'now'),
            'usuario_id' => User::pluck('id')->random()
        ];
    }
}
