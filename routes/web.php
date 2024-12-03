<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\CantantesController;
use App\Http\Controllers\CancionesController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\PlaylistsController;
use App\Http\Controllers\AgregarCancionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::delete('usuarios/eliminar/{id}', [usuariosController::class, 'delete'])->name('usuarios.delete');

    Route::get('/cantantes', [CantantesController::class, 'index'])->name('cantantes.index');
    Route::POST('/cantantes/crear', [CantantesController::class, 'create'])->name('cantantes.create');
    Route::get('/cantantes/editar/{id}', [CantantesController::class, 'edit'])->name('cantantes.edit');
    Route::put('/cantantes/{id}', [CantantesController::class, 'update'])->name('cantantes.update');
    Route::delete('cantantes/eliminar/{id}', [CantantesController::class, 'delete'])->name('cantantes.delete');

    Route::get('/canciones', [CancionesController::class, 'index'])->name('canciones.index');
    Route::POST('/canciones/crear', [CancionesController::class, 'create'])->name('canciones.create');
    Route::get('/canciones/editar/{id}', [CancionesController::class, 'edit'])->name('canciones.edit');
    Route::put('/canciones/{id}', [CancionesController::class, 'update'])->name('canciones.update');
    Route::delete('canciones/eliminar/{id}', [CancionesController::class, 'delete'])->name('canciones.delete');

    Route::get('/spotify/login', [ApiController::class, 'login'])->name('spotify.login');
    Route::get('/callback', [ApiController::class, 'callback'])->name('spotify.callback');
    Route::get('/playlists', [ApiController::class, 'playlists'])->name('spotify.playlists');
    Route::get('/top-artists', [ApiController::class, 'getTopArtists'])->name('spotify.top.artists');

    Route::get('/cantantes_usuario', [CantantesController::class, 'index'])->name('cantantes_usuario.index');
    Route::get('/canciones_usuario', [CancionesController::class, 'index'])->name('canciones_usuario.index');
    Route::get('/canciones', [CancionesController::class, 'index'])->name('canciones.index');
    Route::POST('/canciones/crear', [CancionesController::class, 'create'])->name('canciones.create');

    Route::get('/playlists', [PlaylistsController::class, 'index'])->name('playlists.index');
    Route::POST('/playlists/crear', [PlaylistsController::class, 'create'])->name('playlists.create');
    Route::get('/playlists/editar/{id}', [PlaylistsController::class, 'edit'])->name('playlists.edit');
    Route::put('/playlists/{id}', [PlaylistsController::class, 'update'])->name('playlists.update');
    Route::delete('playlists/eliminar/{id}', [PlaylistsController::class, 'delete'])->name('playlists.delete');

    Route::POST('/playlist/agregar', [AgregarCancionController::class, 'agregarCancion'])->name('playlists.agregar_cancion');
    Route::get('/canciones/buscar', [PlaylistsController::class, 'buscarCanciones'])->name('canciones.buscar');

    Route::get('/cantante_canciones/{id}', [CantantesController::class, 'canciones'])->name('cantante.canciones');

    Route::get('/playlist_canciones/{id}', [PlaylistsController::class, 'canciones'])->name('playlist.canciones');
    Route::delete('playlist_canciones/eliminar/{id}', [AgregarCancionController::class, 'delete'])->name('playlist_canciones.delete');

    Route::get('/', [ApiController::class, 'index']);




});

require __DIR__.'/auth.php';
