<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DesativaUsuarioController extends Controller
{

    public function desativar(Request $request)
    {
        $usuario = User::find($request->id);

        $usuario->ativo = false;
        $usuario->save();

        return redirect('/listaUsuarios');
    }
}
