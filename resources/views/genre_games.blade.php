@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<div id="genre" class="margen container">  
    <div class="encabezado-juegos"><h1>{{$genreGame}}</h1></div>
    <form action="/genre_games/{{$genreGame}}" tipe="post">
        <input type="text" id="busqueda-juegos" name="busqueda" placeholder="Buscar juego"> | 
        <input type="radio" name="price" value="price-min"> Precio Min | 
        <input type="radio" name="price" value="price-max"> Precio Max
        <button id="busqueda-boton" type="submit">Buscar</button>
    </form>
    <div class="galeria">
        @foreach($juegos as $item)
        <div class="juego">
            <div class="interno">
            <a href="/game/{{ $item->id }}" class="btn-card"><img class="rounded mx-auto d-block imagen-juego" src="{{$item->cover}}"  alt="Card image cap">
                <div class="nombre-juego">{{ $item->name }}</div>
                <div class="precio-juego">{{ $item->price }}€</div>
            </a> 
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection