<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class DeletaCategoriaController extends Controller
{

    public function deletar(Request $request)
    {
        $categoria = Categoria::find($request->id);

        $categoria->delete();

        return redirect('/listaCategorias');
    }
}
