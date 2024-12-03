<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 

class UsuariosController extends Controller
{
    public function index()
    {
        if(Auth::user()->rol == 'Administrador')
        {
            $usuarios = User::all();
            return view ('usuarios')->with('usuarios', $usuarios);
        }
    }
    
    public function delete($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
    }
}
