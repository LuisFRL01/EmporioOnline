<?php

namespace App\Validator;

class ValidationException extends \Exception
{
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
