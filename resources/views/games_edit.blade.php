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
<h1>Editar datos del Juego</h1>
        <div class="col-12">
            <form method="POST" action="{{route("games.update", [$game])}}" enctype="multipart/form-data">
                @method("PUT")
                @csrf
                <div class="form-group editar-juego">
                     <!--<div class="textos">     
                            <label class="label">Nombre del juego</label>       
                            <input required value="{{$game->Nombre}}" autocomplete="off" name="Nombre" class="form-control"
                            type="text" placeholder="Nombre">
                            <label class="label">Género</label>
                            <input required value="{{$game->Genero}}" autocomplete="off" name="Genero" class="form-control"
                            type="text" placeholder="Genero">                     
                            <label class="label">Descripción Breve</label>
                            <textarea required value="{{$game->TextoCorto}}" autocomplete="off" name="TextoCorto" class="form-control"
                            type="text" placeholder="TextoCorto">{{$game->TextoCorto}}</textarea>
                            <label class="label">Descripción Ampliada</label>
                            <textarea required value="{{$game->Texto}}" autocomplete="off" name="Texto" class="form-control" rows="5";
                            type="text" placeholder="Texto">{{$game->Texto}}</textarea>
                            <label class="label">Desarrollador</label>
                            <input required value="{{$game->Estado}}" autocomplete="off" name="Estado" class="form-control"
                            type="text" placeholder="Estado">
                            <label class="label">Precio</label>
                            <input required value="{{$game->Precio}}" autocomplete="off" name="Precio" class="form-control"
                            type="text" placeholder="Precio">                            
                     </div>
                     <div class="separador"></div>
                     <div class="media">
                            <label class="label">Link Video</label>
                            <iframe src="https://www.youtube.com/embed/{{$game->Video}}" title="YouTube video player" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <input required value="{{$game->Video}}" autocomplete="off" name="Video" class="form-control"
                            type="text" placeholder="Video">      
                            <label class="label">Caratula</label>
                            <img src="{{$game->Caratula}}" class="img-fluid borde-luminoso caratula" alt="...">
                            <input required value="{{$game->Caratula}}" autocomplete="off" name="Caratula" class="form-control"
                            type="text" placeholder="Caratula">  
                     </div>-->
                     
                    <div class="textos">  
                     <label class="label">Nombre</label>       
                    <input required autocomplete="off" value="{{$game->name}}"  name="name" class="form-control"
                            type="text" placeholder="Nombre del juego" required>
                    <label class="label">Genero</label>                    
                    <select class="form-control" name="genre" required>
                    @foreach($generos as $genero)
                        @if($game->genre == $genero->id)
                        <option value="{{$genero->id}}" selected>{{$genero->name}}</option>
                        @else
                        <option value="{{$genero->id}}">{{$genero->name}}</option>
                        @endif
                    @endforeach
                    </select>
                    <!--<label class="label">Carátula</label>
                    <input name="cover" class="form-control"
                            type="file" placeholder="Carátula del juego" value="{{$game->cover}}">
                    <label class="label">Video</label><br>
                    <iframe src="https://www.youtube.com/embed/{{$game->video}}" title="YouTube video player" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <input required autocomplete="off" name="video" value="{{$game->video}}" class="form-control"
                            type="text" placeholder="Video del juego en youtube." required>-->
                    <label class="label">Texto de Introducción</label>
                    <textarea rows="4" cols="50" class="form-control" name="text1" placeholder="Texto de introducción del juego." required>{{$game->text1}}</textarea>
                    <label class="label">Texto de ampliación 1</label>
                    <textarea rows="4" cols="50" class="form-control" name="text2" placeholder="Texto opcional de ampliación de la información." >{{$game->text2}}</textarea>
                    <label class="label">Texto de ampliación 2</label>
                    <textarea rows="4" cols="50" class="form-control" name="text3" placeholder="Texto opcional de ampliación de la información." >{{$game->text3}}</textarea>
                    <label class="label">Precio</label>
                    <input required autocomplete="off" name="price" value="{{$game->price}}"  class="form-control"
                            type="text" placeholder="Precio del juego" required>
                    </div>
                    <div class="separador"></div>
                     <div class="media">
                            <label class="label">Link Video</label>
                            <iframe src="https://www.youtube.com/embed/{{$game->video}}" title="YouTube video player" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <input required value="{{$game->video}}" autocomplete="off" name="video" class="form-control"
                            type="text" placeholder="Video">      
                            <label class="label">Carátula</label>
                            <img src="{{$game->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
                            <input autocomplete="off" id="cover-game" name="cover-game" class="form-control"
                            type="file" placeholder="Caratula del juego">  
                            <input required value="{{$game->cover}}" id="url-game" autocomplete="off" name="cover" class="form-control"
                            type="text" placeholder="Caratula del juego" required>  
                     </div>


                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("games.index")}}">Volver</a>
            </form>
       </div>
</div>
<script src="{{asset('js/edit_game.js')}}"></script>
@endsection