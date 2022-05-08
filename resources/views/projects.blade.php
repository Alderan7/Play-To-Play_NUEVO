@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
@php
$projects = json_decode(json_encode($proyectos));
@endphp
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<div id="projects" class="container">  
    <h1>proyectos</h1>
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