<?php

namespace Database\Factories;

use App\Models\Caracteristica;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CaracteristicaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Caracteristica::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $produtos = DB::select("select * from produtos");
        return [
            'descricao' => Str::random(20),
            'produto_id' => rand(1, count($produtos))
        ];
    }
}
