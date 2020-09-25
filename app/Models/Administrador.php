<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $fillable = [
        'cpf', 'nome', 'email', 'senha'
    ];
    
    public function denuncias(){
    	return $this->hasMany('App\Models\Denuncia');
    }
}