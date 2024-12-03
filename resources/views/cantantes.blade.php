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
                    <form action="{{ route('cantantes.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="imagen" class="form-label">URL imagen</label>
                            <input type="text" class="form-control" id="imagen" name="imagen" required>
                        </div>
                        <div class="mb-3">
                            <label for="edad" class="form-label">Edad</label>
                            <input type="text" class="form-control" id="edad" name="edad" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_nac" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                        </div>
                        <div class="mb-3">
                            <label for="lugar_nac" class="form-label">Lugar de nacimiento</label>
                            <input type="text" class="form-control" id="lugar_nac" name="lugar_nac">
                        </div>
                        <button id="botones" type="submit" class="btn" style="background-color:orange; color: white">Agregar</button>
                    </form>
                </div>
            </div>

            @foreach($cantantes as $cantante)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width:310px">
                        <img src="{{ $cantante->imagen }}" class="card-img-top" alt="Imagen de {{ $cantante->nombre }}" style="height:290px;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><b>{{ $cantante->nombre }} {{ $cantante->apellido ?? '' }}</b></h5>
                            <h6 class="card-text"><b>ID:</b> {{ $cantante->id }}</h6>
                            <h6 class="card-text"><b>Edad:</b> {{ $cantante->edad }}</h6>
                            <h6 class="card-text"><b>Fecha de nacimiento:</b> {{ $cantante->fecha_nac }}</h6>
                            <h6 class="card-text"><b>Lugar de nacimiento:</b> {{ $cantante->lugar_nac }}</h6>
                        </div>

                        <div class="card-footer text-center">
                            <a href="{{ route('cantantes.edit', $cantante->id) }}" class="btn" style="background-color:orange; color: white">Editar</a>
                            <form action="" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $cantante->id }}">
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