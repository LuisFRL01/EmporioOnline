<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ListaDenunciaController extends Controller
{
    public function show(){
        $denuncias = DB::table('denuncias')->paginate(15);
        return view('denuncia/lista', ['denuncias' => $denuncias]);
    }

    public static function returnNomeProduto($id){
        $nomeProduto = DB::table('produtos')->where('id', $id)->value('nome');
        return $nomeProduto;
    }

    public static function returnUsuarioNome($id){
        $nomeUsuario = DB::table('users')->where('id', $id)->value('name');
        return $nomeUsuario;
    }
}