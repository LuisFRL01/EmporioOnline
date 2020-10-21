<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ExibeProdutoController extends Controller
{
    public function show(Request $request)
    {
        $produto = NULL;
        if (is_numeric($request->id)) {
            $produto = Produto::find(intval($request->id));
            return view('produto/exibe', ['produto' => $produto]);
        } else {
            return redirect('/');
        }
    }
}
