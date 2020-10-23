<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
         'nome'
    ];

    public static $rules = [
        'nome' =>'required|min:4|max:20'
    ];

    public static $messages = [
        'nome.*' => 'O nome é um campo obrigatório, único e deve ter entre 4 e 20 caracteres'
    ];

    public function categorias(){
    	return $this->hasMany('App\Models\Categoria');
    }

    public function produtos(){
        return $this->hasMany('App\Models\Produto');
    }

    public function administrador(){
    	return $this->belongsTo('App\Models\User');
    }
}
