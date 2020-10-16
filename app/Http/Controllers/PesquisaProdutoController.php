<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PesquisaProdutoController extends Controller
{
    public function show(Request $request)
    {
        $produtos = Produto::where('nome', '=', $request->search);
        return view('produto.procura-produtos', ['produtos' => $produtos->get()->toArray()]);
    }
}
