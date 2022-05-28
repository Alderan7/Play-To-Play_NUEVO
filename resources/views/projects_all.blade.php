@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<div id="projects" class="container">  
<div class="encabezado-juegos"><h1>proyectos</h1></div>
<form action="/projects_all" tipe="post">
        <input type="text" id="busqueda-juegos" name="busqueda" placeholder="Buscar proyecto">
        <button id="busqueda-boton" type="submit">Buscar</button>
    </form>
    <div class="galeria">
    @foreach($proyectos as $item)
        <div class="juego">
            <div class="interno">
            <a href="/project/{{ $item->id }}" class="btn-card"><img class="rounded mx-auto d-block imagen-juego" src="{{$item->cover}}"  alt="Card image cap">
                <div class="nombre-juego">{{ $item->name }}</div>
            </a> 
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection