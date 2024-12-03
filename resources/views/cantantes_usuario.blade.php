@extends('layouts.app')

@section('content')
<div style="background-color: #fdd68a; min-height: 100vh; padding: 20px;">
    <div class="container">
        <div class="row justify-content-center">
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
                            <a href="{{ route('cantante.canciones', $cantante->id) }}" class="btn" style="background-color:orange; color: white">Ver más</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection