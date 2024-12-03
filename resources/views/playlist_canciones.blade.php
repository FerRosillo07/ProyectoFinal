@extends('layouts.app')

@section('content')
<div style="background-color: #fdd68a; min-height: 100vh; padding: 20px;">
    <div class="container">
        <h1 class="mb-4"><b>{{ $playlist->nombre }}</b></h1>
        <table class="table">
            <tbody>
                @foreach($playlist->canciones as $cancion)
                <tr>
                    <td><b>{{ $cancion->nombre }}</b></td>
                    <td>{{ $cancion->cantante->nombre }} {{ $cancion->cantante->apellido ?? '' }}</td>
                    <td>{{ $cancion->duracion }}</td>
                    <td>
                        <form action="{{ route('playlist_canciones.delete', $cancion->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $cancion->id }}">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
