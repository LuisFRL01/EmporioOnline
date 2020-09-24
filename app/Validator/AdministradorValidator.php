<?php

namespace App\Validator;

class AdministradorValidator
{
	public static function validate($data){
		$validator = \Validator::make($data, \App\Model\Administrador::$rules, \App\Model\Administrador::$messages);
		if($validator->errors()->isEmpty())
			throw new ValidationException($validator, "Erro na validação do Administrador");
		return $validator;
	}
}
