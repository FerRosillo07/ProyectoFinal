<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancion;
use App\Models\Cantante;
use App\Models\Playlist;
use Illuminate\Support\Facades\Auth; 

class CancionesController extends Controller
{
    public function index()
    {
        if(Auth::user()->rol == 'Administrador')
        {
            $canciones = Cancion::all();
            $cantantes = Cantante::all();
            return view ('canciones')->with(['canciones' => $canciones, 'cantantes' => $cantantes]);
        }

        if(Auth::user()->rol == 'Usuario')
        {
            $canciones = Cancion::all();
            $cantantes = Cantante::all();
            $playlists = Playlist::where('id_usuario', auth()->id())->get();
            return view ('canciones_usuario')->with(['canciones' => $canciones, 'cantantes' => $cantantes, 'playlists' => $playlists]);
        }
    }

    public function create(Request $request)
    {
        $nuevaCancion = new Cancion();
        $nuevaCancion->nombre = $request->nombre;
        $nuevaCancion->id_cantante = $request->id_cantante;
        $nuevaCancion->duracion = $request->duracion;
        $nuevaCancion->anio = $request->anio;
    
        $nuevaCancion->save();

        return redirect()->route('canciones.index')->with('success', 'Cancion agregada correctamente');
    }

    public function edit($id)
    {
        $cancion = Cancion::find($id);
        $cantantes = Cantante::all();
        return view ('editarCanciones')->with(['cancion' => $cancion, 'cantantes' => $cantantes]);
    }

    public function update(Request $request, $id) {
        
        $cancion = Cancion::find($id);
        $cancion->nombre = $request->input('nombre');
        $cancion->id_cantante = $request->input('id_cantante');
        $cancion->duracion = $request->input('duracion');
        $cancion->anio = $request->input('anio');
    
        $cancion->save();
    
        return redirect()->route('canciones.index')->with('success', 'Usuario actualizado correctamente');
    }
    
    public function delete($id)
    {
        $cancion = Cancion::find($id);
        $cancion->delete();
    }
}
