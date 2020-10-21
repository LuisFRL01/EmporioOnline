<?php

namespace App\Http\Controllers;

use App\Validator\DenunciaValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DenunciaAnuncioController extends Controller
{

    public $idProduto;

    public function show(Request $request)
    {
        return view('produto/denuncia', ['id' => $request->id]);
    }

    public function sendDenuncia(Request $request)
    {
        try {
            DenunciaValidator::validate($request->all());

            DB::insert('insert into denuncias (mensagem, user_id, produto_id) values (?, ?, ?)', [$request->mensagem, Auth::user()->id, $request->produto_id]);

            session()->flash('success', 'Sua denuncia foi realiza com sucesso');

            return redirect()->back();
        } catch (ValidationException $exception) {
            return redirect()->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
