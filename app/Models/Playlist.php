<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = 'playlists';
    
    protected $fillable = [
        'nombre',
        'id_usuario',
        'fecha_cre'
    ];

    public function canciones()
    {
        return $this->belongsToMany(Cancion::class, 'agregar_canciones', 'id_playlist', 'id_cancion');
    }
}