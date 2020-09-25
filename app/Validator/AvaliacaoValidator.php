<?php

namespace App\Validator;


class AvaliacaoValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Avaliacao::$rules, \App\Models\Avaliacao::$messages);
        if($validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação da Avaliação");
        return $validator;
    }
}
