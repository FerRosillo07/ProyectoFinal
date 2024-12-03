@extends('layouts.app')

@section('content')
<div style="background-color: #fdd68a; min-height: 100vh; padding: 20px;">
    <div class="container">
        <div class="row justify-content-center">
            <table>
                <thead>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantante</th>
                    <th>Duracion</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    @foreach($canciones as $cancion)
                        @php
                            $cantante = $cantantes->firstWhere('id', $cancion->id_cantante);
                        @endphp
                        <tr>
                            <td>{{ $cancion->id }}</td>
                            <td>{{ $cancion->nombre }}</td>
                            <td>{{ $cantante->nombre }} {{ $cantante->apellido ?? '' }}</td>
                            <td>{{ $cancion->duracion }}</td>
                            <td>{{ $cancion->anio }}</td>
                            <td style="display: flex; align-items: center; gap: 10px;">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalAgregar{{ $cancion->id }}" style="background-color:orange; color: white;">
                                    Agregar
                                </button>
                                <div class="modal fade" id="modalAgregar{{ $cancion->id }}" tabindex="-1" aria-labelledby="modalAgregarLabel{{ $cancion->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalAgregarLabel{{ $cancion->id }}">Agregar a Playlist</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('playlists.agregar_cancion') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_cancion" value="{{ $cancion->id }}">
                                                    <div class="mb-3">
                                                        <label for="id_playlist{{ $cancion->id }}" class="form-label">Selecciona una Playlist</label>
                                                        <select name="id_playlist" id="id_playlist{{ $cancion->id }}" class="form-select" required>
                                                            <option value="" disabled selected>Seleccionar Playlist</option>
                                                            @foreach($playlists as $playlist)
                                                                <option value="{{ $playlist->id }}">{{ $playlist->nombre }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn" style="background-color:orange; color: white;">Agregar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection