<?php

namespace App\Http\Controllers;

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
            $pedido[$id]['quantidade'] += $request->quantidade;
        } else {
            $dados = array();
            $dados['quantidade'] = $request->quantidade;
            $produto = \App\Models\Produto::find($id);
            $dados['preco'] = $produto->preco;
            $dados['produto'] = $produto->nome;
            $pedido[$id] = $dados;
        }

        $request->session()->put('itens', $pedido);

        return redirect("/pedido");

    }

}
