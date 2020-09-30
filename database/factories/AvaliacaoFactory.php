<?php

namespace Database\Factories;

use App\Models\Avaliacao;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AvaliacaoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Avaliacao::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $usuarios = DB::select("select * from usuarios");
        return [
            'nota' => rand(0, 5),
            'texto' => Str::random(40),
            'cliente_id' => rand(1, count($usuarios)),
            'vendedor_id' => rand(1, count($usuarios))
        ];
    }
}
