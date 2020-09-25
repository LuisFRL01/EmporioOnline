<?php


namespace App\Validator;


class CategoriaValidator
{
    public static function validate($data){
        $validator = \Validator::make($data, \App\Models\Categoria::$rules, \App\Models\Categoria::$messages);
        if(!$validator->errors()->isEmpty())
            throw new ValidationException($validator, "Erro na validação da Categoria");
        return $validator;
    }

}
