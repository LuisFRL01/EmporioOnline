<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalizarPedidoController extends Controller
{
    public function finalizar(Request $request) {
        if($request->session()->has('itens')) {
            $usuario = Auth::user();

            $carrinho = $request->session()->get('itens');
            $itens = array();
            $total = 0;
            foreach($carrinho as $k => $dados) {
                $itens[] = \App\Models\ItemPedido::make([
                    'produto_id' => $k,
                    'quantidade' => $dados['quantidade'],
                    'preco' =>$dados['preco'],
                    'frete' => 100
                ]);
                $total += $dados['subtotal'];
            }
            $pedido = \App\Models\Pedido::create([
                'user_id' => $usuario->id,
                'total' => $total,
                'data' => date('d/m/Y H:i')
            ]);
            $pedido->itemPedidos()->saveMany($itens);

            $carrinho = array();
            $request->session()->put('itens', $carrinho);
            return "Compra realizada com sucesso";

        } else {
            return "Erro: carrinho vazio";
        }
    }
}
