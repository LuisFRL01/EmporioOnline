<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Validator\CategoriaValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditaCategoriaController extends Controller
{

    public function show(Request $request)
    {
        $categoria = Categoria::find($request->id);
        $todasCategorias = Categoria::All();

        return view('categoria/edita', ['categoria' => $categoria, 'todasCategorias' => $todasCategorias]);
    }

    public function update(Request $request)
    {
        try {
            CategoriaValidator::validate($request->all());

            $categoria = Categoria::find($request->id);
            $categoria->nome = $request->nome;
            $categoria->administrador_id = Auth::user()->id;

            $categoriaPai = $request->input('categoriaMenu');
            if ($categoriaPai != 'Categoria Pai') {
                $categoria->categoria_id = $categoriaPai;
            }
            $categoria->update();

            return redirect('/listaCategorias');
        } catch (ValidationException $exception) {
            return redirect()->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
