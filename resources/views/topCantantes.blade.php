@extends('layouts.app')

@section('content')
<div style=" min-height: 100vh; ">
    <h1 class="display-5" style="text-align:center; font-weight:bolder">TUS ARTISTAS FAVORITOS</h1>
    <div id="corousel">
        <div id="topArtistas" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($topArtists->items as $index => $artist)
                    <div class="carousel-item @if($index === 0) active @endif" style="position: relative; height: 400px; overflow: hidden;"> 
                        <div class="background-blur"
                            style="background-image: url('{{ $artist->images[0]->url }}'); 
                            background-size: cover; 
                            background-position: center; 
                            height: 500px;
                            width: 100%;
                            filter: blur(5px); 
                            position: absolute; 
                            z-index: -1;">
                        </div>
                        <div class="text-center" style="padding-top: 20px;">
                            <img src="{{ $artist->images[0]->url }}" class="d-block mx-auto" alt="{{ $artist->name }}" style="width: 200px; height: auto;">
                            <h2 class="mt-3" style="color: white; font-weight:bold">{{ $artist->name }}</h2>
                            <p  style="color: white; font-weight:bold">Géneros: {{ implode(', ', $artist->genres) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#topArtistas" data-bs-slide="prev" style="">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#topArtistas" data-bs-slide="next" style="">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>

    <br><br><br>

    <div id="cancionesCarousel" class="container">
        <h1 class="display-5" style="text-align:center; font-weight:bolder">TUS CANCIONES MÁS REPRODUCIDAS</h1>
        <div id="cancionesCarouselInner" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach(collect($topTracks->items)->chunk(4) as $index => $trackChunk)
                    <div class="carousel-item @if($index === 0) active @endif">
                        <div class="row">
                            @foreach($trackChunk as $track)
                                <div class="col-md-3 mb-4">
                                    <div class="card h-100 shadow-sm" style="border: 1px solid black">
                                        <img src="{{ $track->album->images[0]->url }}" class="card-img-top" alt="{{ $track->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $track->name }}</h5>
                                            <p class="card-text">
                                                <strong>Artista:</strong> {{ $track->artists[0]->name }}<br>
                                                <strong>Álbum:</strong> {{ $track->album->name }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#cancionesCarouselInner" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#cancionesCarouselInner" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>

    <br><br><br>

    <div id="discosCarousel" class="container">
        <h1 class="display-5" style="text-align:center; font-weight:bolder">TUS DISCOS</h1>
        <div class="row">
            @foreach($favoriteAlbums->items as $album)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ $album->album->images[0]->url }}" class="card-img-top" alt="{{ $album->album->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $album->album->name }}</h5>
                            <p class="card-text">
                                <strong>Artista:</strong> {{ $album->album->artists[0]->name }}<br>
                                <strong>Tracks:</strong> {{ $album->album->total_tracks }}<br>
                                <strong>Fecha:</strong> {{ $album->album->release_date }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</div>

@endsection





