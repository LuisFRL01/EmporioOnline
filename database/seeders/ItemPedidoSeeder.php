<?php

namespace Database\Seeders;

use App\Models\ItemPedido;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedidos = count(DB::select("select * from pedidos"));
        for($i = 1; $i <= $pedidos; $i++)
        ItemPedido::factory()->create(['pedido_id' => $i]);
    }
}
