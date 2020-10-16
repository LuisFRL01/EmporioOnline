<?php

namespace App\Http\Controllers;

use App\Models\Produto;

class WelcomeController extends Controller
{
    public function show(){
        $produtos = Produto::all()->take(8);
        return view('welcome', ['produtos' => $produtos]);
    }
}