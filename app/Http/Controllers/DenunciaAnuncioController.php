<?php

namespace App\Http\Controllers;

use App\Models\Denuncia;
use App\Validator\DenunciaValidator;
use App\Validator\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

            $denuncia  = new Denuncia();
            $denuncia->mensagem = $request->mensagem;
            $denuncia->user_id = Auth::user()->id;
            $denuncia->produto_id = $request->produto_id;

            $denuncia->save();

            session()->flash('success', 'Sua denuncia foi realiza com sucesso');

            return redirect()->back();
        } catch (ValidationException $exception) {
            return redirect()->back()
                ->withErrors($exception->getValidator())
                ->withInput();
        }
    }
}
