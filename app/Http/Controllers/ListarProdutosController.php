<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ListarProdutosController extends Controller
{
    public function listar(){
        $id_user = Auth::user()->id;
        $produtos = DB::select("select * from produtos where user_id = $id_user");
        return view('produto/lista', ['produtos' => $produtos]);
    }
}
