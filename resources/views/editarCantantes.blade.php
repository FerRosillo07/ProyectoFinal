@extends('layouts.app')

@section('content')

<div style="background-color: #fdd68a; min-height: 100vh; padding: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('cantantes.update', $cantante->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$cantante->nombre}}">
                    </div>
                    <div class="mb-3">
                        <label for="apellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="apellido" name="apellido" value="{{$cantante->apellido}}">
                    </div>
                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="text" class="form-control" id="imagen" name="imagen" value="{{$cantante->imagen}}">
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="text" class="form-control" id="edad" name="edad" value="{{$cantante->edad}}">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_nac" class="form-label">Fecha de nacimiento</label>
                        <input type="text" class="form-control" id="fecha_nac" name="fecha_nac" value="{{$cantante->fecha_nac}}">
                    </div>
                    <div class="mb-3">
                        <label for="lugar_nac" class="form-label">Lugar de nacimiento</label>
                        <input type="text" class="form-control" id="lugar_nac" name="lugar_nac" value="{{$cantante->lugar_nac}}">
                    </div>
                    
                    <button type="submit" class="btn" style="background-color:orange; color: white">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection