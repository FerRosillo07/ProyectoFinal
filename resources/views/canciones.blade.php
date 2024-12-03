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
                    <form action="{{ route('canciones.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_cantante" class="form-label">Cantante</label>
                            <select class="form-select" id="id_cantante" name="id_cantante" required>
                                <option value="" selected disabled>Selecciona un cantante</option>
                                @foreach ($cantantes as $cantante)
                                    <option value="{{ $cantante->id }}">{{ $cantante->nombre }} {{ $cantante->apellido ?? '' }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="duracion" class="form-label">Duracion</label>
                            <input type="text" class="form-control" id="duracion" name="duracion" required>
                        </div>
                        <div class="mb-3">
                            <label for="anio" class="form-label">Año</label>
                            <input type="text" class="form-control" id="anio" name="anio" required>
                        </div>
                        <button id="botones" type="submit" class="btn" style="background-color:orange; color: white">Agregar</button>
                    </form>
                </div>
            </div>

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
                                <a href="{{ route('canciones.edit', $cancion->id) }}" class="btn" style="background-color:orange; color: white;">Editar</a>
                                <form action="" method="POST" style="margin: 0;">
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
</div>
@endsection