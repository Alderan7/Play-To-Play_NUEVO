@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
@php
    $url = config('global.storage')
@endphp
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/tables.css') }}" rel="stylesheet">
<div class="container margen">
<div class="encabezado-juegos">
    <h1>Panel de administración de Juegos</h1>
    </div>

        <div class="col-12">
            <div class="boton-centrado">
                <a href="{{route("games.create")}}" class="btn btn-success mb-2 boton-nuevo">AÑADIR NUEVO JUEGO</a>
            </div>
            <table class=" container">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Carátula</th>                    
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($games as $game)
                    <tr>                                            
                        <td class="nombre">{{$game->name}}</td>
                        <td><img class="imagen-tabla" src="{{$url}}{{$game->cover}}"></td>
                        <td>
                            <a class="btn btn-warning boton" href="{{route("games.edit",[$game])}}">
                                <i class="fa fa-edit">Editar</i>
                            </a>
                            <form action="{{route("games.destroy", [$game])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger boton">
                                    <i class="fa fa-trash">Eliminar</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            @if($games->lastPage()!=1)
            <div class="container navegador pagination-wrapper">
                <a class="enlace-flecha" href="{{$games->previousPageUrl()}}">
                    <img class="flechas" src="../images/playInverso.svg">
                </a>
                @for($i=1;$i<=$games->lastPage();$i++)
                    @if($games->currentPage()==$i)
                        <a class="pagina-actual" href="{{$games->url($i)}}">{{$i}}</a>
                    @else
                        <a class="paginas-navegador" href="{{$games->url($i)}}">{{$i}}</a>
                    @endif                    
                @endfor
                <a class="enlace-flecha" href="{{$games->nextPageUrl()}}">
                    <img class="flechas" src="../images/play.svg">
                </a>
            </div>
            @endif

        </div>
    </div>
@endsection