@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<link href="{{ asset('css/edit_game.css') }}" rel="stylesheet">
<div class="margen container">
<div class="encabezado-juegos">
<h1>Crear nuevo Proyecto</h1>
    </div>

        <div class="col-12">
            <form method="POST" action="{{route("projects.store")}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                <label class="label">Nombre</label>       
                    <input required autocomplete="off" name="name" class="form-control"
                            type="text" placeholder="Nombre del Proyecto" required>
                    <label class="label">Genero</label><br>
                    <select name="genre">
                        <option value="0" selected disabled>Seleccione un género...</option>
                    @foreach($generos as $genero)
                        <option value="{{$genero->id}}">{{$genero->name}}</option>
                    @endforeach
                    </select>
                    <br>
                    <label class="label">Texto de Introducción</label>
                    <textarea rows="4" cols="50" class="form-control" name="text1" placeholder="Texto de introducción del juego." required></textarea>
                    <label class="label">Texto de ampliación 1</label>
                    <textarea rows="4" cols="50" class="form-control" name="text2" placeholder="Texto opcional de ampliación de la información."></textarea>
                    <label class="label">Texto de ampliación 2</label>
                    <textarea rows="4" cols="50" class="form-control" name="text3" placeholder="Texto opcional de ampliación de la información."></textarea>
                    <label class="label">Donación Básica</label>
                    <input required autocomplete="off" name="pledge1" class="form-control"
                            type="text" placeholder="Aportación básica al proyecto" required>
                     <label class="label">Donación Intermedia</label>
                    <input required autocomplete="off" name="pledge2" class="form-control"
                            type="text" placeholder="Aportación intermedia al proyecto" required>
                     <label class="label">Donación Superior</label>
                    <input required autocomplete="off" name="pledge3" class="form-control"
                            type="text" placeholder="Aportación básica al proyecto" required>
                        <label class="label">Imagen del Proyecto</label>
                        <input autocomplete="off" id="image-game" name="image" class="form-control"
                        type="file" placeholder="Caratula del juego">     
                        <label class="label">Carátula del Proyecto</label>
                        <input autocomplete="off" id="cover-game" name="cover" class="form-control"
                        type="file" placeholder="Caratula del juego">  

                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("projects.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection

