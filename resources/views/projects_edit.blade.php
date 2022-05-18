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
<h1>Editar datos del Proyecto</h1>
        <div class="col-12">
            <form method="POST" action="{{route("projects.update", [$project])}}">
                @method("PUT")
                @csrf
                <div class="form-group editar-juego">
              <div class="textos"> 
                    <label class="label">Nombre</label>       
                    <input required autocomplete="off" value="{{$project->name}}"  name="name" class="form-control"
                            type="text" placeholder="Nombre del Proyecto" required>
                    <label class="label">Genero</label>                    
                    <select class="form-control" name="genre" required>
                    @foreach($generos as $genero)
                        @if($project->genre == $genero->id)
                        <option value="{{$genero->id}}" selected>{{$genero->name}}</option>
                        @else
                        <option value="{{$genero->id}}">{{$genero->name}}</option>
                        @endif
                    @endforeach
                    </select>    
                    <label class="label">Texto de Introducción</label>
                    <textarea rows="4" cols="50" class="form-control" name="text1" placeholder="Texto de introducción del juego." required>{{$project->text1}}</textarea>
                    <label class="label">Texto de ampliación 1</label>
                    <textarea rows="4" cols="50" class="form-control" name="text2" placeholder="Texto opcional de ampliación de la información." >{{$project->text2}}</textarea>
                    <label class="label">Texto de ampliación 2</label>
                    <textarea rows="4" cols="50" class="form-control" name="text3" placeholder="Texto opcional de ampliación de la información." >{{$project->text3}}</textarea>
                    <label class="label">Donación Básica</label>
                    <input required autocomplete="off" name="pledge1" value="{{$project->pledge1}}"  class="form-control"
                            type="text" placeholder="Aportación básica al proyecto" required>
                     <label class="label">Donación Intermedia</label>
                    <input required autocomplete="off" name="pledge2" value="{{$project->pledge2}}"  class="form-control"
                            type="text" placeholder="Aportación intermedia al proyecto" required>
                     <label class="label">Donación Superior</label>
                    <input required autocomplete="off" name="pledge3" value="{{$project->pledge3}}"  class="form-control"
                            type="text" placeholder="Aportación básica al proyecto" required>
                     </div>
                     <div class="separador"></div>
                    <div class="media">
                            <label class="label">Imagen del Proyecto</label>
                            <img src="{{$project->image}}">
                            <input required value="{{$project->image}}" autocomplete="off" name="image" class="form-control"
                            type="text" placeholder="">   
                            <input autocomplete="off" id="image-game" name="image-game" class="form-control"
                            type="file" placeholder="Caratula del juego">     
                            <label class="label">Carátula del Proyecto</label>
                            <img src="{{$project->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
                            <input autocomplete="off" id="cover-game" name="cover-game" class="form-control"
                            type="file" placeholder="Caratula del juego">  
                            <input required value="{{$project->cover}}" id="url-game" autocomplete="off" name="cover" class="form-control"
                            type="text" placeholder="Caratula del Proyecto" required>  
                     </div>
                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("projects.index")}}">Volver</a>
            </form>
        </div>
    </div>
    <script src="{{asset('js/edit_game.js')}}"></script>
@endsection