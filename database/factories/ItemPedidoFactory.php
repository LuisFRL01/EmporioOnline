<?php

namespace Database\Factories;

use App\Models\ItemPedido;
use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ItemPedidoFactory extends Factory
{

    protected $model = ItemPedido::class;

    public function definition()
    {
        $produtos = DB::select("select * from produtos");
        $produto_id = count($produtos);
        return [
            'produto_id' => rand(1, $produto_id),
            'quantidade' =>rand(1, Produto::find($produto_id)->quantidade),
            'frete' => 50,
            'preco' => Produto::find($produto_id)->preco
        ];
    }
}
