<?php

namespace Database\Factories;

use App\Models\Produto;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        $usuarios = DB::select("select * from usuarios");
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

        return [
            'nome' => $faker->productName,
            'quantidade' => rand(1, 100),
            'preco' => rand(1, 1000),
            'data' => date('d/m/Y H:i'),
            'descricao' => "Produto de Qualidade Inigualavel no Mercado!",
            'usuario_id' => rand(1, count($usuarios))
        ];
    }
}
