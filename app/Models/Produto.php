<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 'quantidade', 'preco', 'data', 'descricao', 'estado', 'avaliacao', 'nota', 'ativo'
    ];

    protected $appends = [
        'photo_url',
    ];

    public static $rules = [
        'nome' => 'required|min:4|max:50',
        'quantidade' => 'required|min:1|max:5',
        'preco' => 'required|min:1|max:6',
        'descricao' =>'required|min:10|max:200',
        'estado' => 'required',
        'nota' =>'numeric|between:0,5|max:1',
        'photo_url' => 'required|image|mimes:jpg,png,jpeg'
    ];

    public static $messages = [
        'nome.*' => 'O nome é um campo obrigatório, e deve ter entre 4 e 50 caracteres',
        'quantidade.*' => 'A quantidade é um campo obrigatório, e deve ter entre 1 e 5 digitos',
        'preco.*' => 'O preço é um campo obrigatório, e deve ter entre 1 e 6 digitos',
        'descricao.*' => 'A descrição é um campo obrigatório, e deve ter entre 10 e 200 caracteres',
        'estado.*' => 'O estado é um atributo obrigatório',
        'avaliacao.*' => 'A avaliacao é um campo obrigatório, e deve ter entre 10 e 200 caracteres',
        'A imagem deve ser do tipo jpg, png ou jpeg'
    ];

    public function denuncias(){
    	return $this->hasMany('App\Models\Denuncia');
    }

    public function categoria(){
    	return $this->belongsTo('App\Models\Categoria');
    }

    public function caracteristicas(){
    	return $this->hasMany('App\Models\Caracteristica');
    }

    public function User(){
    	return $this->belongsTo('App\Models\User');
    }

    public function pedido(){
    	return $this->belongsTo('App\Models\Pedido');
    }

    public function administrador(){
    	return $this->hasOne('App\Models\User');
    }
}
