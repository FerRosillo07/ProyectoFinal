<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancion extends Model
{
    protected $table = 'canciones';
    
    protected $fillable = [
        'nombre',
        'id_cantante',
        'duracion',
        'anio'
    ];

    public function cantante()
    {
        return $this->belongsTo(Cantante::class, 'id_cantante');
    }
}
