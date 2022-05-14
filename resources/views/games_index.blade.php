@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/tables.css') }}" rel="stylesheet">
<div class="row margen">
        <div class="col-12">
            <a href="{{route("games.create")}}" class="btn btn-success mb-2">Agregar</a>
            <table class=" container">
                <thead>
                <tr>
                    <th>Caratula</th>
                    <th>Nombre</th>
                    <th>Genero</th>
                    <th>Precio</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($juegos as $juego)
                    <tr>   
                        <td><img class="imagen-tabla" src="{{$juego->cover}}"></td>                    
                        <td>{{$juego->name}}</td>
                        <td>{{$juego->genre}}</td>
                        <td>{{$juego->price}}</td>
                        <td>
                            <a class="btn btn-warning boton" href="{{route("games.edit",[$juego])}}">
                                <i class="fa fa-edit">Editar</i>
                            </a>
                            <form action="{{route("games.destroy", [$juego])}}" method="post">
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

            <!--{{$juegos->links()}}-->
            <div class="container navegador pagination-wrapper">
                <!--{!! $juegos->links() !!}-->
                <!-- a Tag for previous page -->
                <a href="{{$juegos->previousPageUrl()}}">
                    Atrás<!-- You can insert logo or text here -->
                </a>
                @for($i=0;$i<=$juegos->lastPage();$i++)
                    <!-- a Tag for another page -->
                    <a href="{{$juegos->url($i)}}">{{$i}}</a>
                @endfor
                <!-- a Tag for next page -->
                <a href="{{$juegos->nextPageUrl()}}">
                    <!-- You can insert logo or text here -->
                    Adelante
                </a>

            </div>
        </div>
    </div>
    
@endsection