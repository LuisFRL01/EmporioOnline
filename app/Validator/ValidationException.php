<?php

namespace App\Validator;

class ValidationException extends \Exception
{
<<<<<<< HEAD
    protected $validator;

    public function _construct($validator, $text = "Erro na Validação dos Dados")
    {
        parent::_construct($text);
        $this->validator = $validator;
    }

    public function getValidator()
    {
        return $this->validator;
    }
}
=======
	protected $validator;
	
	public function _construct($validator, $text = "Erro na Validação dos Dados"){
		parent::_construct($text);
		$this->validator = $validator;
	}
	
	public function getValidator(){
		return $this->validator;
	}
>>>>>>> 584caf4d0e28f098809bb6b2fa56d8ddd2e66df3
