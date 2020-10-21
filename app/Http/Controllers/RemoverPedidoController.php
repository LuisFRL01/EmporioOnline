<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RemoverPedidoController extends Controller
{

    public function remover (Request $request, $produto_id) {
        if($request->session()->has('itens')) {
            $pedido = $request->session()->get('itens');
        }

        if(array_key_exists($produto_id, $pedido)) {
            unset($pedido[$produto_id]);
        }
        $request->session()->put('itens', $pedido);

        return redirect("/pedido");

    }

}
