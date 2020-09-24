<?php

namespace App\Validator;

public class AdministradorValidator
{
	public static function validate($data){
		$validator = \Validator::make($data, \App\Administrador::$rules, \App\Administrador::$messages);
		if($validator->errors()->isEmpty())
			throw new ValidationException($validator, "Erro na validação do Administrador");
		return $validator;
	}
}
