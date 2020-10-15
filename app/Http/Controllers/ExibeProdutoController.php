<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ExibeProdutoController extends Controller
{
    public function show(Request $request){
        $produto = Produto::find($request->id);
        return view('produto/exibe', ['produto' => $produto]);
    }
}