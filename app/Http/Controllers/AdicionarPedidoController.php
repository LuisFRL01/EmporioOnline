<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class AdicionarPedidoController extends Controller
{
    public function adicionar (Request $request) {
        if($request->session()->has('itens')) {
            $pedido = $request->session()->get('itens');
        } else {
            $pedido = array();
        }

        $id = $request->produto_id;

        if(array_key_exists($id, $pedido)) {
            $produto = Produto::find($id);
            if(($pedido[$id]['quantidade'] + $request->quantidade) <= $produto->quantidade){
                $pedido[$id]['quantidade'] += $request->quantidade;
            } else{
                $pedido[$id]['quantidade'] = $produto->quantidade;
            }

        } else {
            $dados = array();
            $dados['quantidade'] = $request->quantidade;
            $produto = Produto::find($id);
            $dados['preco'] = $produto->preco;
            $dados['produto'] = $produto->nome;
            $dados['subtotal'] = $produto->preco * $request->quantidade;
            $pedido[$id] = $dados;
        }

        $request->session()->put('itens', $pedido);

        return redirect("/pedido");

    }

}
