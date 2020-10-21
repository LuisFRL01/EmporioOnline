<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResolveDenunciaController extends Controller
{

    public function resolver(Request $request)
    {
        $denuncia = Denuncia::find($request->id);

        if ($denuncia->resolvido == 1) {
            $denuncia->resolvido = false;
        } else {
            $denuncia->resolvido = true;
        }
        $denuncia->administrador_id = Auth::user()->id;
        $denuncia->update();

        return redirect('/listaDenuncias');
    }
}
