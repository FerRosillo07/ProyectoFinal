@extends('layouts.app')

@section('content')
<div style="background-color: #fdd68a; min-height: 100vh; padding: 20px;">
    <div class="container">
        <div class="row justify-content-center">
            @foreach($usuarios as $usuario)
                @if($usuario->rol != 'Administrador')
                    <div class="col-md-4 mb-4">
                        <div class="card" style="width:353px">
                            <img src="https://img.freepik.com/vector-premium/lindo-personaje-fantasma-ilustracion-auriculares_608606-705.jpg" class="card-img-top" alt="Imagen de {{ $usuario->name }}" style="height:300px; width:350px">

                            <div class="card-body text-center">
                                <h5 class="card-title"><b>{{ $usuario->name }} {{ $usuario->apellidoP ?? '' }} {{ $usuario->apellidoM ?? '' }}</b></h5>
                                <h6 class="card-text"><b>ID:</b> {{ $usuario->id }}</h6>
                                <h6 class="card-text"><b>Correo:</b> {{ $usuario->email }}</h6>
                            </div>

                            <div class="card-footer text-center">
                                <a href="#" class="btn" style="background-color:orange; color: white">Ver playlists</a>
                                <form action="" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $usuario->id }}">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endsection
