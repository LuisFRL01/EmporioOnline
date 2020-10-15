<?php

namespace App\Http\Controllers;

use App\Models\User;

class ListaUsuariosController extends Controller
{
    public function show(){
        $usuarios = User::where('tipo', '=','user')->paginate(15);
        return view('usuario/lista', ['usuarios' => $usuarios]);
    }
}