<?php

namespace App\Validator;

<<<<<<< HEAD
class AdministradorValidator
{
	public static function validate($data){
		$validator = \Validator::make($data, \App\Model\Administrador::$rules, \App\Model\Administrador::$messages);
=======
public class AdministradorValidator
{
	public static function validate($data){
		$validator = \Validator::make($data, \App\Administrador::$rules, \App\Administrador::$messages);
>>>>>>> 584caf4d0e28f098809bb6b2fa56d8ddd2e66df3
		if($validator->errors()->isEmpty())
			throw new ValidationException($validator, "Erro na validação do Administrador");
		return $validator;
	}
}
