<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Playlist;
use App\Models\Cancion;
use Illuminate\Support\Facades\Auth; 

class PlaylistsController extends Controller
{
    public function index()
    {
        if(Auth::user()->rol == 'Usuario')
        {
            $playlists = Playlist::all();
            $canciones = Cancion::with('cantante')->get();

            return view ('playlists')->with(['playlists' => $playlists, 'canciones' => $canciones]);
        }
    }

    public function create(Request $request)
    {
        $nuevaPlaylist = new Playlist();
        $nuevaPlaylist->nombre = $request->nombre;
        $nuevaPlaylist->id_usuario = $request->id_usuario;
        $nuevaPlaylist->fecha_cre = $request->fecha_cre;

        $nuevaPlaylist->save();

        return redirect()->route('playlists.index')->with('success', 'Playlist agregada correctamente');
    }

    public function edit($id)
    {
        $playlist = Playlist::find($id);
        return view ('editarPlaylists')->with('playlist', $playlist);
    }

    public function update(Request $request, $id) {
        
        $playlist = Playlist::find($id);
        $playlist->nombre = $request->input('nombre');
    
        $playlist->save();
    
        return redirect()->route('playlists.index')->with('success', 'Playlist actualizada correctamente');
    }
    
    public function delete($id)
    {
        $playlist = Playlist::find($id);
        $playlist->delete();

        return redirect()->route('playlists.index')->with('success', 'Playlist eliminada correctamente');
    }

    public function canciones($id)
    {
        $playlist = Playlist::with('canciones')->findOrFail($id);

        return view('playlist_canciones', compact('playlist'));
    }


}