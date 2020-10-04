<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class cadastroProdutoController extends Controller
{
    public function preparar()
    {
        return view('produto/cadastro');
    }

    public function cadastrar(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->quantidade = $request->quantidade;
        $produto->preco = $request->preco;
        $produto->descricao = $request->descricao;
        $produto->estado = $request->estado;
        $produto->user_id = Auth::user()->id;
        $produto->save();

        return redirect("/listarProdutos");
    }
}
