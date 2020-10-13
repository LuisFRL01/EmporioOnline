<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ListaCategoriasController extends Controller
{
    public function show(){
        $categorias = DB::table('categorias')->paginate(15);
        return view('categoria/lista', ['categorias' => $categorias]);
    }

    public static function returnCategoriaPai($id){
        $categoriaPai = DB::table('categorias')->where('id', $id)->value('nome');
        return $categoriaPai;
    }
}
