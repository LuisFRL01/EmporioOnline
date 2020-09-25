<?php


namespace App\Validator;


class DenunciaValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Denuncia::$rules, \App\Models\Denuncia::$messages);
        if($validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação da Denuncia");
        return $validator;
    }

}
