<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Validator\ProdutoValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class editarProdutoController extends Controller
{

    public function editar(Request $request)
    {
        $produto = Produto::find($request->id);

        if (Gate::allows('update-produto', $produto)) {
            return view('produto/editar', ['produto' => $produto]);
        } else if (Gate::denies('update-produto', $produto)) {
            abort('403', 'Não Autorizado');
        }
    }

    public function atualizar(Request $request)
    {
        try {
            ProdutoValidator::validate($request->all());

            $produto = Produto::find($request->id);
            $produto->nome = $request->nome;
            $produto->quantidade = $request->quantidade;
            $produto->preco = $request->preco;
            $produto->descricao = $request->descricao;
            $produto->estado = $request->estado;
            $produto->user_id = $request->user_id;

            Storage::delete($produto->photo_url);

            $nomeOrginal = $request->file('photo_url')->getClientOriginalName();
            $nome = str_replace(" ", "", $nomeOrginal);

            $path = $request->file('photo_url')->storeAs(
                'produtosImg',
                $nome
            );

            $produto->photo_url = $path;

            $produto->update();

            return redirect('/listarProdutos');
        } catch (ValidationException $exception) {
            return redirect('/editarProduto/' . $request->id)
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
