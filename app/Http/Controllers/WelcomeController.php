<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function show(){
        $produtos = DB::select("select * from produtos ORDER BY id DESC LIMIT 8");
        return view('welcome', ['produtos' => $produtos]);
    }
}
