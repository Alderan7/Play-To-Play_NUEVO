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
<h1>Crear nuevo Juego</h1>
        <div class="col-12">
            <form method="POST" action="{{route("games.store")}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>       
                    <input required autocomplete="off" name="name" class="form-control"
                            type="text" placeholder="Nombre del juego" required>
                    <label class="label">Genero</label>
                    
                    <select class="form-control" name="genre" required>
                        <option value="" selected disabled>Seleccione un género...</option>
                    @foreach($generos as $genero)
                        <option value="{{$genero->id}}">{{$genero->name}}</option>
                    @endforeach
                    </select>
                    <label class="label">Carátula</label>
                    <input required autocomplete="off" name="cover" class="form-control"
                            type="file" placeholder="Carátula del juego" required>
                    <label class="label">Video</label>
                    <input required autocomplete="off" name="video" class="form-control"
                            type="text" placeholder="Video del juego en youtube." required>
                    <label class="label">Texto de Introducción</label>
                    <textarea rows="4" cols="50" class="form-control" name="text1" placeholder="Texto de introducción del juego." required></textarea>
                    <label class="label">Texto de ampliación 1</label>
                    <textarea rows="4" cols="50" class="form-control" name="text2" placeholder="Texto opcional de ampliación de la información." ></textarea>
                    <label class="label">Texto de ampliación 2</label>
                    <textarea rows="4" cols="50" class="form-control" name="text3" placeholder="Texto opcional de ampliación de la información." ></textarea>
                    <label class="label">Precio</label>
                    <input required autocomplete="off" name="price" class="form-control"
                            type="text" placeholder="Precio del juego" required>
                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("games.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection

