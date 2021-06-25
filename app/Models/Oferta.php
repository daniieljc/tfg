<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'ofertas';

    protected $fillable = [
        'categoria'
    ];

    public function scopeName($query, $categoria)
    {
        if ($categoria)
            return $query->where('categoria', '=', "$categoria");
    }
}
