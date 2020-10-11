<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class deletarProdutoController extends Controller
{

    public function deletar(Request $request)
    {
        $produto = Produto::find($request->id);
        if (Gate::allows('delete-produto', $produto)) {
            $produto->delete();
        }
        return redirect('/listarProdutos');
    }
}
