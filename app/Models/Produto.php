<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nome', 'quantidade', 'preco', 'data', 'descricao', 'estado', 'avaliacao', 'nota', 'caracteristicas',
    ];
    
    public function denuncias(){
    	return this->hasMany('App\Models\Denuncia');
    }
    
    public function categorias(){
    	return this->hasMany('App\Models\Categoria');
    }
    
    public function usuario(){
    	return this->belongsTo('App\Models\Usuario');
    }
    
    public function pedido(){
    	return this.belongsTo('App\Models\Pedido');
    }
    
    public function administrador(){
    	return this.hasOne('App\Models\Administrador');
    }
}
