<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

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
            'password' => Hash::make('password'),
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
