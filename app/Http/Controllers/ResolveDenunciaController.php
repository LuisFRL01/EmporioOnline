<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use Illuminate\Http\Request;

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

        $denuncia->save();

        return redirect('/listaDenuncias');
    }
}
