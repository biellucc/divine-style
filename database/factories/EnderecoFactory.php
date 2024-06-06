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
            'cep' => $this->faker->postcode(),
            'pais' => $this->faker->country(),
            'estado' =>$this->faker->state(),
            'cidade' => $this->faker->city(),
            'bairro' => $this->faker->streetName(),
            'endereco' => $this->faker->address(),
            'n_residencia' => $this->faker->buildingNumber()
        ];
    }
}
