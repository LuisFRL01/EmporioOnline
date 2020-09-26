<?php

namespace Database\Factories;

use App\Models\Administrador;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdministradorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Administrador::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => rand(10000000000, 99999999999),
            'nome' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'senha' => 'password'
        ];
    }
}
