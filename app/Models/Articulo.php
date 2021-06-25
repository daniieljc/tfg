<?php

namespace App\Models;

use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulos';

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }
}
