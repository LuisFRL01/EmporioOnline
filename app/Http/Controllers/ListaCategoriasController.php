<?php

namespace App\Http\Controllers;

use App\Models\Categoria;

class ListaCategoriasController extends Controller
{
    public function show(){
        $categorias = Categoria::all();
        return view('categoria/lista', ['categorias' => $categorias]);
    }
}
