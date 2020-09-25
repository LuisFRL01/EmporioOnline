<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota', 'texto'
    ];

    public static $rules = [
        'nota' =>'required|numeric|between:0,5|max:1',
        'texto' => 'max:200'
    ];

    public static $messages = [
        'nota.*' => 'A nota é um campo obrigatório, e deve ser um numero entre 0 e 5',
        'texto.*' => 'O texto tem tamanho maximo de 200 caracteres'
    ];


    public function cliente(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function vendedor(){
        return $this->belongsTo('App\Models\Usuario');
    }
}
