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
        'name', 'email', 'password', 'cpf', 'numTelefone', 'cartao', 'ativo', 'rua', 'numeroResidencia', 'bairro', 'cep',
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
