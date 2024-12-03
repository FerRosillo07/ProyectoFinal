<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cantante extends Model
{
    protected $table = 'cantantes';

    protected $fillable = [
        'nombre',
        'apellido',
        'imagen',
        'edad',
        'fecha_nac',
        'lugar_nac'
    ];

  
}
