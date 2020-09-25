<?php


namespace App\Validator;


class CaracteristicaValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Caracteristica::$rules, \App\Models\Caracteristica::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação da Caracteristica");
        return $validator;
    }

}
