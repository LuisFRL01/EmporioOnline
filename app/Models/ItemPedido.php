<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemPedido extends Model
{
    use HasFactory;
    protected $fillable = ["produto_id", "quantidade", "preco", "frete"];

    public function pedido() {
        return $this->belongsTo('\App\Models\ItemPedido');
    }
    public function produto() {
        return $this->belongsTo('\App\Models\ItemPedido', 'produto_id');
    }
}
