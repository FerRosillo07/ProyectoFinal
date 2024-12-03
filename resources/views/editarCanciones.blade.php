@extends('layouts.app')

@section('content')

<div style="background-color: #fdd68a; min-height: 100vh; padding: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('canciones.update', $cancion->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cancion->nombre}}">
                    </div>
                    <div class="mb-3">
                        <label for="id_cantante" class="form-label">Cantante</label>
                        <select class="form-select" id="id_cantante" name="id_cantante" required>
                            <option value="{{$cancion->nombre}}" selected disabled>Selecciona un cantante</option>
                            @foreach ($cantantes as $cantante)
                                <option value="{{ $cantante->id }}">{{ $cantante->nombre }} {{ $cantante->apellido ?? '' }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="duracion" class="form-label">Duracion</label>
                        <input type="text" class="form-control" id="duracion" name="duracion" value="{{$cancion->duracion}}">
                    </div>
                    <div class="mb-3">
                        <label for="anio" class="form-label">Año</label>
                        <input type="text" class="form-control" id="anio" name="anio" value="{{$cancion->anio}}">
                    </div>
                    
                    <button type="submit" class="btn" style="background-color:orange; color: white">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection