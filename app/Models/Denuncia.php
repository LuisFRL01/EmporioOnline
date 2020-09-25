<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    use HasFactory;

    protected $fillable = [
         'mensagem',
    ];

    public static $rules = [
        'mensagem' =>'required|min:10|max:200'
    ];

    public static $messages = [
        'mensagem.*' => 'A mensagem é um campo obrigatório, e deve ter entre 10 e 200 caracteres'
    ];

    public function usuario(){
    	return $this->belongsTo('App\Models\Usuario');
    }

    public function produto(){
    	return $this->belongsTo('App\Models\Produto');
    }

    public function administrador(){
    	return $this->hasOne('App\Models\Administrador');
    }
}
