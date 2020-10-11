<?php

namespace App\Validator;

use Illuminate\Support\Facades\Validator;

class AdministradorValidator
{
	public static function validate($data){
		$validator = Validator::make($data, \App\Models\User::$rules, \App\Models\User::$messages);
		if(!$validator->errors()->isEmpty())
			throw new ValidationException($validator, "Erro na validação do Administrador");
		return $validator;
	}
}
