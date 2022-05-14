@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
@php
$game = json_decode(json_encode($juegos));
@endphp
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<div id="games" class="container">  
    <h1>juegos</h1>
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