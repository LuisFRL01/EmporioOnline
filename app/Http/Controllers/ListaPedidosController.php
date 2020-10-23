<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class ListaPedidosController extends Controller
{
    public function listar()
    {
        $pedidos = Pedido::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('pedido/lista', ['pedidos' => $pedidos]);
    }

}
