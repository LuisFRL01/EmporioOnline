<?php

namespace Database\Factories;

use App\Models\Pedido;
use Carbon\Carbon;
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
        $total = rand(1, 1000);
        return [
            'total' => $total,
            'data' => Carbon::now(),
            'user_id' => rand(1, count($users))
        ];
    }
}
