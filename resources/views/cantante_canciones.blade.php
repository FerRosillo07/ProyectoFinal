@extends('layouts.app') 

@section('content')
<div style="background-color: #fdd68a; min-height: 100vh; padding: 20px;">
    <div class="container">
        <h1 class="text-center"><b>Canciones de {{ $cantante->nombre }} {{ $cantante->apellido ?? '' }}</b></h1>
        <div class="row">
            @forelse($canciones as $cancion)
            <div class="col-md-4 mb-4">
                <div class="card d-flex flex-row justify-content-between align-items-center">
                    <div class="card-body">
                        <h5 class="card-title"><b>{{ $cancion->nombre }}</b></h5>
                        <h6 class="card-text"><b>Duración:</b> {{ $cancion->duracion }}</h6>
                        <h6 class="card-text"><b>Año:</b> {{ $cancion->anio }}</h6>
                    </div>
                    <div>
                        <button class="btn" style="background-color:orange; color: white; margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#modalAgregarPlaylist{{ $cancion->id }}"> Agregar </button>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalAgregarPlaylist{{ $cancion->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $cancion->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel{{ $cancion->id }}">Agregar a Playlist</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('playlists.agregar_cancion') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_cancion" value="{{ $cancion->id }}">
                                
                                <div class="mb-3">
                                    <label for="id_playlist" class="form-label">Selecciona una Playlist</label>
                                    <select name="id_playlist" id="id_playlist" class="form-select" required>
                                        <option value="" disabled selected>Seleccionar Playlist</option>
                                        @foreach($playlists as $playlist)
                                            <option value="{{ $playlist->id }}">{{ $playlist->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <button type="submit" class="btn" style="background-color:orange; color: white">Agregar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @empty
                <p class="text-center">Aún no hay canciones.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection