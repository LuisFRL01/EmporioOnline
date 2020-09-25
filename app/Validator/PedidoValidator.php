<?php


namespace App\Validator;

use Illuminate\Support\Facades\Validator;


class PedidoValidator
{
    public static function validate($data){
        $validator = Validator::make($data, \App\Models\Pedido::$rules, \App\Models\Pedido::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Pedido");
        return $validator;
    }

}
