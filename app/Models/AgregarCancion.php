<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgregarCancion extends Model
{
    protected $table = 'agregar_canciones';
    
    protected $fillable = [
        'id_cancion',
        'id_playlist',
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'id_playlist');
    }

    public function cancion()
    {
        return $this->belongsTo(Cancion::class, 'id_cancion');
    }
  
}