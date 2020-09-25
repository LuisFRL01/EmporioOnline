<?php


namespace App\Validator;

use Illuminate\Support\Facades\Validator;


class UsuarioValidator
{
    public static function validate($data){
        $validator = Validator::make($data, \App\Models\Usuario::$rules, \App\Models\Usuario::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação do Usuário");
        return $validator;
    }

}
