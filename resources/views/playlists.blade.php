@extends('layouts.app')

@section('content')
<div style="background-color: #fdd68a; min-height: 100vh; padding: 20px;">
    <div class="container">
        <div class="row justify-content-center">
            <p class="d-inline-flex gap-1">
                <a class="btn" style="background-color:orange; color: white" data-bs-toggle="collapse" href="#collapseExample" role="button">Agregar</a>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <form action="{{ route('playlists.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <input type="hidden" name="id_usuario" value="{{ auth()->user()->id }}">

                        <input type="hidden" name="fecha_cre" value="{{ now() }}">
                        
                        <button id="botones" type="submit" class="btn" style="background-color:orange; color: white">Agregar</button>
                    </form>
                </div>
            </div>

            @foreach($playlists as $playlist)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width:320px">
                        <img src="https://static.vecteezy.com/system/resources/previews/008/605/158/non_2x/music-notes-icon-with-headphones-music-cartoon-icon-illustration-recreation-technology-icon-concept-isolated-premium-flat-cartoon-style-vector.jpg" class="card-img-top" alt="Imagen de {{ $playlist->nombre }}">
                        <div class="card-body text-center">
                            <h5 class="card-title"><b>{{ $playlist->nombre }}</b></h5>
                            <h6 class="card-text"><b>Fecha de creación: </b> {{ $playlist->fecha_cre }}</h6>
                        </div>

                        <div class="card-footer text-center">
                            <a href="{{ route('playlist.canciones', $playlist->id) }}" class="btn" style="background-color:orange; color: white">Ver</a>
                            <button type="button" class="btn" style="background-color:orange; color: white" data-bs-toggle="modal" data-bs-target="#modalPlaylist{{ $playlist->id }}"> Agregar </button>

                            <div class="modal fade" id="modalPlaylist{{ $playlist->id }}" tabindex="-1" aria-labelledby="modalPlaylistLabel{{ $playlist->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalPlaylistLabel{{ $playlist->id }}">Agregar a "{{ $playlist->nombre }}"</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div id="songResults{{ $playlist->id }}" style="max-height: 400px; overflow-y: auto;">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="resultsBody{{ $playlist->id }}">
                                                        @foreach($canciones as $cancion)
                                                            <tr>
                                                                <td><b>{{ $cancion->nombre }}</b></td>
                                                                <td>{{ $cancion->cantante->nombre }} {{ $cancion->cantante->apellido ?? '' }}</td>
                                                                <td>{{ $cancion->duracion }}</td>
                                                                <td>
                                                                    <form action="{{ route('playlists.agregar_cancion') }}" method="POST">
                                                                        @csrf
                                                                        <input type="hidden" name="id_playlist" value="{{ $playlist->id }}">
                                                                        <input type="hidden" name="id_cancion" value="{{ $cancion->id }}">
                                                                        <button type="submit" class="btn" style="background-color:orange; color: white">Agregar</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <a href="{{ route('playlists.edit', $playlist->id) }}" class="btn" style="background-color:orange; color: white">Editar</a>
                            <form action="{{ route('playlists.delete', $playlist->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $playlist->id }}">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection