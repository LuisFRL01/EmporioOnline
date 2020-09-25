<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf', 'nome', 'email'
    ];

    protected $hidden = [
        'senha',
    ];

    public static $rules = [
        'nome' => 'required|min:4|max:50',
        'cpf' => 'required|min:11|max:11',
        'email' => 'required|min:16|max:254|unique:administradors',
        'senha' => 'required|min:8|max:30'
    ];

    public static $messages = [
        'nome.*' => 'O nome é um campo obrigatório, e deve ter entre 4 e 50 caracteres',
        'cpf.*' => 'O cpf é um campo obrigatório, e deve ter 11 caracteres considerando somente os numeros',
        'email.*' => 'O email é um campo unico e obrigatório e deve ter entre 16 e 254 caracteres',
        'senha.*' => 'A senha é um campo obrigatório e deve ter entre 8 e 30 caracteres'
    ];

    public function denuncias(){
    	return $this->hasMany('App\Models\Denuncia');
    }
}
