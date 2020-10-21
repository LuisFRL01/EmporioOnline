<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'total', 'data', 'user_id'
    ];

    public static $rules = [
        'total' => 'required|min:1|max:6',
        'data' => 'required',
    ];

    public static $messages = [
        'total.*' => 'O valor total é um campo obrigatório, e deve ter entre 1 e 6 digitos',
        'data.*' => 'A data é um campo obrigatório',
    ];

    public function User()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function ItemPedidos()
    {
        return $this->hasMany('App\Models\ItemPedido');
    }
}
