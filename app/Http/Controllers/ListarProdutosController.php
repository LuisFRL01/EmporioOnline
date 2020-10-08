<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListarProdutosController extends Controller
{
    public function listar(){
        $produtos = Produto::all();
        return view('produto/lista', ['produtos' => $produtos]);
    }
}
