<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Validator\CategoriaValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CadastroCategoriaController extends Controller
{
    public function show()
    {
        return view('categoria/cadastro');
    }

    public function cadastrar(Request $request)
    {
        try {
            CategoriaValidator::validate($request->all());

            $categoria = new Categoria();
            $categoria->nome = $request->nome;
            $categoria->administrador_id = Auth::user()->id;
            $categoria->save();

            return redirect('/listaCategorias');
        } catch(ValidationException $exception){
            return redirect('cadastroCategoria')
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
