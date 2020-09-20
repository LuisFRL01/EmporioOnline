<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'nota', 'texto',
    ];

    public function cliente(){
        return $this->belongsTo('App\Models\Usuario');
    }

    public function vendedor(){
        return $this->belongsTo('App\Models\Usuario');
    }
}
