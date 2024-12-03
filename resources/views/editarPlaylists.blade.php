@extends('layouts.app')

@section('content')

<div style="background-color: #fdd68a; min-height: 100vh; padding: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <form action="{{ route('playlists.update', $playlist->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$playlist->nombre}}">
                    </div>
                    
                    <button type="submit" class="btn" style="background-color:orange; color: white">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection