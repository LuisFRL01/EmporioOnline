<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;

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
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //'numTelefone', 'cartao', 'ativo', 'rua', 'numeroResidencia', 'bairro', 'cep'
    public static $rules = [
        'name' => 'required|min:4|max:50',
        'cpf' => 'required|integer|digits:11',
        'email' => 'required|min:10|max:254',
        'password' => 'required|min:8|max:30',
        'numTelefone' => 'required|integer|digits:11',
        'rua' => 'required',
        'numeroResidencia' => 'required|min:1|max:6',
        'bairro' => 'required|min:3|max:30',
        'cep' => 'required|integer|digits:8'
    ];

    public static $messages = [
        'name.*' => 'O nome é um campo obrigatório, e deve ter entre 4 e 50 caracteres',
        'cpf.*' => 'O CPF é um campo unico e obrigatório, e deve ter 11 digitos',
        'email.*' => 'O email é um campo unico e obrigatório e deve ter entre 10 e 254 caracteres',
        'password.*' => 'A senha é um campo obrigatório e deve ter entre 8 e 30 caracteres',
        'numTelefone.*' => 'O telefone deve ter 11 dígitos',
        'rua.*' => 'A rua é um campo obrigatório',
        'numeroResidencia.*' => 'O numero da residência é um campo obrigatório, e deve ter entre 1 e 6 digitos',
        'bairro.*' => 'O bairro é um campo obrigatório, e deve ter entre 3 e 30 caracteres',
        'cep.*' => 'O CEP é um campo obrigatório, e deve ter 8 digitos'
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
