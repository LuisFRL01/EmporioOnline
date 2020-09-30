<?php

namespace Database\Factories;

use App\Models\Denuncia;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DenunciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Denuncia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $usuarios = DB::select("select * from usuarios");
        $produtos = DB::select("select * from produtos");
        return [
            'mensagem' => Str::random(50),
            'usuario_id' => rand(1, count($usuarios)),
            'produto_id' => rand(1, count($produtos))
        ];
    }
}
