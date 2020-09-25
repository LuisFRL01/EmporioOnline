<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'cpf', 'numTelefone', 'cartao', 'ativo', 'rua', 'numeroResidencia', 'bairro', 'cep'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //'numTelefone', 'cartao', 'ativo', 'rua', 'numeroResidencia', 'bairro', 'cep'
    public static $rules = [
        'name' => 'required|min:4|max:50',
        'cpf' => 'required|integer|min:11|max:11',
        'email' => 'required|min:16|max:254|unique:administradors',
        'password' => 'required|min:8|max:30',
        'numTelefone' => 'required|integer|min:11|max:11',
        'rua' => 'required',
        'numeroResidencia' => 'required|integer|min:1|max:6',
        'bairro' => 'required|min:3|max:30',
        'cep' => 'required|integer|min:8|max:8'
    ];

    public static $messages = [
        'name.*' => 'O nome é um campo obrigatório, e deve ter entre 4 e 50 caracteres',
        'cpf.*' => 'O cpf é um campo obrigatório, e deve ter 11 digitos, considerando somente os numeros',
        'email.*' => 'O email é um campo unico e obrigatório e deve ter entre 16 e 254 caracteres',
        'password.*' => 'A senha é um campo obrigatório e deve ter entre 8 e 30 caracteres',
        'numTelefone.*' => 'required|integer|min:11|max:11',
        'rua.*' => 'A rua é um campo obrigatório',
        'numeroResidencia.*' => 'O numero da residência é um campo obrigatório, e deve ter entre 1 e 6 digitos',
        'bairro.*' => 'O bairro é um campo obrigatório, e deve ter entre 3 e 30 caracteres',
        'cep.*' => 'O cep é um campo obrigatório, e deve ter 8 digitos, considerando somente os numeros'
    ];

    public function avaliacao(){
        return $this->hasOne('App\Models\Avaliacao');
    }

    public function produtos(){
    	return $this->hasMany('App\Models\Produto');
    }

    public function pedidos(){
    	return $this->hasMany('App\Models\Pedido');    
    }

    public function denuncias(){
    	return $this->hasMany('App\Models\Denuncia');
    }

}
