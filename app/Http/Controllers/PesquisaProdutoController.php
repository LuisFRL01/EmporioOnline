<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesquisaProdutoController extends Controller
{
    public function show(Request $request)
    {
        $produtos = DB::select("select * from produtos where LOWER(nome) like LOWER('%{$request->search}%')");
        return view('produto.procura-produtos', ['produtos' => $produtos]);
    }
}
