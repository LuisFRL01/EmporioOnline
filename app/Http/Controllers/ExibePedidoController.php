<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExibePedidoController extends Controller
{
    public function exibe(Request $request) {
        if(!$request->session()->has('itens')) {
            $pedido = array();
            $request->session()->put('itens', $pedido);
        }
        return view('pedido/exibe');
    }
}
