<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalizarPedidoController extends Controller
{
    public function finalizar(Request $request)
    {
        if ($request->session()->has('itens')) {
            $carrinho = $request->session()->get('itens');
            $usuario = Auth::user();
            $itens = array();
            $total = 0;
            foreach ($carrinho as $k => $dados) {
                $itens[] = \App\Models\ItemPedido::make([
                    'produto_id' => $k,
                    'quantidade' => $dados['quantidade'],
                    'preco' => $dados['preco'],
                    'frete' => 100
                ]);

                $this->alterarProduto($k, $dados['quantidade']);

                $total += $dados['subtotal'];
            }
            if (!empty($itens)) {
                $pedido = \App\Models\Pedido::create([
                    'user_id' => $usuario->id,
                    'total' => $total,
                    'data' => date('d/m/Y H:i')
                ]);

                $pedido->itemPedidos()->saveMany($itens);

            }

            $carrinho = array();
            $request->session()->put('itens', $carrinho);
            return redirect(route('pedidos'));
        } else {
            return "Erro: carrinho vazio";
        }
    }

    private function alterarProduto($produto_id, $quantidade)
    {
        $produto = Produto::find($produto_id);
        if($produto->quantidade >= $quantidade){
            $produto->quantidade -= $quantidade;
            $produto->update();
        }

    }

}
