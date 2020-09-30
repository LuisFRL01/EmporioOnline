<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    // 'cartao', 'ativo', 'rua', 'numeroResidencia', 'bairro', 'cep'
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password', // password
            'cpf' => rand(10000000000, 99999999999),
            'numTelefone' => rand(00000000000, 99999999999),
            'rua' => $this->faker->streetName,
            'numeroResidencia' => $this->faker->buildingNumber,
            'bairro' => $this->faker->cityPrefix,
            'cep' => 55 . rand(000000,999999),
            'remember_token' => Str::random(10),
        ];
    }
}
