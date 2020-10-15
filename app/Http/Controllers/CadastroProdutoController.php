<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Validator\ProdutoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class cadastroProdutoController extends Controller
{
    public function preparar()
    {
        $categorias = Categoria::all();
        return view('produto/cadastro', ['categorias' => $categorias]);
    }

    public function cadastrar(Request $request)
    {
        try {
            ProdutoValidator::validate($request->all());
            $produto = new Produto();
            $produto->nome = $request->nome;
            $produto->quantidade = $request->quantidade;
            $produto->preco = $request->preco;
            $produto->descricao = $request->descricao;
            $produto->estado = $request->estado;
            $produto->categoria_id = $request->categoria;
            Auth::user()->produtos()->save($produto);

            return redirect('/listarProdutos');
        } catch(ValidationException $exception){
            return redirect('cadastrarProduto')
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
