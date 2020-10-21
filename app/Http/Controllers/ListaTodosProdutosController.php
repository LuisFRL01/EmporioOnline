<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ListaTodosProdutosController extends Controller
{
    public function show(){
        $produtos = DB::table('produtos')->paginate(15);
        return view('produto/listaTodosProdutos', ['produtos' => $produtos]);
    }
}