<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ListaDenunciaController extends Controller
{
    public function show(){
        $denuncias = DB::table('denuncias')->paginate(15);
        return view('denuncia/lista', ['denuncias' => $denuncias]);
    }
}