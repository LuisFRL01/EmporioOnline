<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao'
    ];

    public static $rules = [
        'descricao' =>'required|min:10|max:200'
    ];

    public static $messages = [
        'descricao.*' => 'A descrição é um campo obrigatório, e deve ter entre 10 e 200 caracteres'
    ];
}
