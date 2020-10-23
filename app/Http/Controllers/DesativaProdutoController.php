<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class DesativaProdutoController extends Controller
{

    public function desativar(Request $request)
    {
        $produto = Produto::find($request->id);

        if ($produto->ativo == 1) {
            $produto->ativo = false;
        } else {
            $produto->ativo = true;
        }

        $produto->update();

        return redirect('/listaTodoProdutos');
    }
}
