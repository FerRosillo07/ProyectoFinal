<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgregarCancion;
use Illuminate\Support\Facades\Auth; 

class AgregarCancionController extends Controller
{
    public function agregarCancion(Request $request)
    {
        $agregarCancion = new AgregarCancion();
        $agregarCancion->id_cancion = $request->id_cancion;
        $agregarCancion->id_playlist = $request->id_playlist;

        $agregarCancion->save();
       
        return redirect()->back()->with('success', 'Canción agregada a la playlist correctamente.');
    }

    public function delete($id)
    {
        $cancion = AgregarCancion::find($id);
        $cancion->delete();

        return redirect()->back()->with('success', 'Cancion eliminada correctamente');
    }
   
}
