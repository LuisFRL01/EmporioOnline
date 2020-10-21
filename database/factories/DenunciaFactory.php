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
        $users = DB::select("select * from users");
        $produtos = DB::select("select * from produtos");
        return [
            'mensagem' => Str::random(50),
            'user_id' => rand(1, count($users)),
            'administrador_id' => rand(51, count($users)),
            'produto_id' => rand(1, count($produtos))
        ];
    }
}
