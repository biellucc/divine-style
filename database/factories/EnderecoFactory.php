<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'usuario_id' => User::pluck('id')->random(),
            'pais' => $this->faker->country(),
            'estado' =>$this->faker->state(),
            'cidade' => $this->faker->city(),
            'bairro' => $this->faker->streetName(),
            'endereco' => $this->faker->address(),
            'logradouro' => $this->faker->buildingNumber(),
            'cep' => $this->faker->postcode()
        ];
    }
}
