<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor', 'total', 'data',
    ];
    
    public function usuario(){
    	return $this->belongsTo('App\Models\Usuario');
    }
    
    public function produtos(){
    	return $this->hasMany('App\Models\Produto');
    }
}
