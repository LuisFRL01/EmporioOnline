<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PesquisaProdutoController extends Controller
{
    public function show(Request $request)
    {
        $produtos = DB::select("select * from produtos where LOWER(nome) like LOWER('%{$request->search}%')");
        return view('produto.procura-produtos', ['produtos' => $produtos]);
    }
}
