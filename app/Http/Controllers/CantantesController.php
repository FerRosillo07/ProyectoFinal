<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cantante;
use App\Models\Cancion;
use App\Models\Playlist;
use Illuminate\Support\Facades\Auth; 

class CantantesController extends Controller
{
    public function index()
    {
        if(Auth::user()->rol == 'Administrador')
        {
            $cantantes = Cantante::all();
            return view ('cantantes')->with('cantantes', $cantantes);
        }

        if(Auth::user()->rol == 'Usuario')
        {
            $cantantes = Cantante::all();
            return view ('cantantes_usuario')->with('cantantes', $cantantes);
        }
    }

    public function create(Request $request)
    {
        $nuevoCantante = new Cantante();
        $nuevoCantante->nombre = $request->nombre;
        $nuevoCantante->apellido = $request->apellido;
        $nuevoCantante->imagen = $request->imagen;
        $nuevoCantante->edad = $request->edad;
        $nuevoCantante->fecha_nac = $request->fecha_nac;
        $nuevoCantante->lugar_nac = $request->lugar_nac;

        $nuevoCantante->save();
    }

    public function edit($id)
    {
        $cantante = Cantante::find($id);
        return view ('editarCantantes')->with('cantante', $cantante);
    }

    public function update(Request $request, $id) {
        
        $cantante = Cantante::find($id);
        $cantante->nombre = $request->input('nombre');
        $cantante->apellido = $request->input('apellido');
        $cantante->imagen = $request->input('imagen');
        $cantante->edad = $request->input('edad');
        $cantante->fecha_nac = $request->input('fecha_nac');
        $cantante->lugar_nac = $request->input('lugar_nac');
    
        $cantante->save();
    
        return redirect()->route('cantantes.index')->with('success', 'Usuario actualizado correctamente');
    }
    
    public function delete($id)
    {
        $cantante = Cantante::find($id);
        $cantante->delete();
    }

    public function canciones($id)
    {
        $cantante = Cantante::findOrFail($id);
        $canciones = Cancion::where('id_cantante', $id)->get();
        $playlists = Playlist::where('id_usuario', auth()->id())->get();

        return view('cantante_canciones', compact('cantante', 'canciones', 'playlists'));
    }

}
