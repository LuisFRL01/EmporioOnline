<?php

namespace Database\Factories;

use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = DB::select("select * from users");
        $valor = rand(1, 1000);
        $frete = rand(1, 80);
        return [
            'valor' => $valor,
            'frete' => $frete,
            'total' => $valor + $frete,
            'data' => date('d/m/Y H:i'),
            'user_id' => rand(1, count($users))
        ];
    }
}
