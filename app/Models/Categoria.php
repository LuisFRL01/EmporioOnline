<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    protected $fillable = [
         'nome',
    ];
    
    public function categorias(){
    	return $this->hasMany('App\Models\Categoria');
    }
    
    public function administrador(){
    	return $this->belongsTo('App\Models\Administrador');
    }
}
