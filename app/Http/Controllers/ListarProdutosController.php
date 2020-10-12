<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

class listarProdutosController extends Controller
{
    public function listar(){
        $produtos = Produto::where('user_id', '=', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        return view('produto/lista', ['produtos' => $produtos]);
    }

}
