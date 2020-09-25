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
