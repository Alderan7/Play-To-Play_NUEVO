@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/tables.css') }}" rel="stylesheet">
<div class="container margen">
<div class="encabezado-juegos">
    <h1>Panel de administración de Juegos</h1>
    </div>

        <div class="col-12">
            <a href="{{route("games.create")}}" class="btn btn-success mb-2">Agregar nuevo Juego</a>
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
                        <td><img class="imagen-tabla" src="{{$game->cover}}"></td>
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

            <!--{{$games->links()}}-->
            <div class="container navegador pagination-wrapper">
                <!--{!! $games->links() !!}-->
                <!-- a Tag for previous page -->
                <a href="{{$games->previousPageUrl()}}">
                    Atrás<!-- You can insert logo or text here -->
                </a>
                @for($i=0;$i<=$games->lastPage();$i++)
                    <!-- a Tag for another page -->
                    <a href="{{$games->url($i)}}">{{$i}}</a>
                @endfor
                <!-- a Tag for next page -->
                <a href="{{$games->nextPageUrl()}}">
                    <!-- You can insert logo or text here -->
                    Adelante
                </a>

            </div>
        </div>
    </div>
@endsection