<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DesativaUsuarioController extends Controller
{

    public function desativar(Request $request)
    {
        $usuario = User::find($request->id);

        if ($usuario->ativo == 1) {
            $usuario->ativo = false;
        } else {
            $usuario->ativo = true;
        }

        $usuario->save();

        return redirect('/listaUsuarios');
    }
}
