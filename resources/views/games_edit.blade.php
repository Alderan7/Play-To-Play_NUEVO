@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<link href="{{ asset('css/edit_game.css') }}" rel="stylesheet">
<div class="row margen container">
        <div class="col-12">
            <form method="POST" action="{{route("games.update", [$juego])}}">
                @method("PUT")
                @csrf
                <div class="form-group editar-juego">
                    <!--<label class="label">Genero</label>
                    <input required value="{{$juego->Genero}}" autocomplete="off" name="Genero" class="form-control"
                           type="text" placeholder="Genero">
                    <label class="label">IdProyecto</label>
                    <input required value="{{$juego->IdProyecto}}" autocomplete="off" name="IdProyecto" class="form-control"
                           type="text" placeholder="IdProyecto">
                    <label class="label">Nombre</label>       
                    <input required value="{{$juego->Nombre}}" autocomplete="off" name="Nombre" class="form-control"
                           type="text" placeholder="Nombre">
                    <label class="label">Estado</label>
                    <input required value="{{$juego->Estado}}" autocomplete="off" name="Estado" class="form-control"
                           type="text" placeholder="Estado">
                    <label class="label">Banner</label>
                    <input required value="{{$juego->Banner}}" autocomplete="off" name="Banner" class="form-control"
                           type="text" placeholder="Banner">
                    <label class="label">Video</label>
                    <input required value="{{$juego->Video}}" autocomplete="off" name="Video" class="form-control"
                           type="text" placeholder="Video">
                    <label class="label">Texto</label>
                    <input required value="{{$juego->Texto}}" autocomplete="off" name="Texto" class="form-control"
                           type="text" placeholder="Texto">
                    <label class="label">Caratula</label>
                    <input required value="{{$juego->Caratula}}" autocomplete="off" name="Caratula" class="form-control"
                           type="text" placeholder="Caratula">
                    <label class="label">TextoCorto</label>
                    <input required value="{{$juego->TextoCorto}}" autocomplete="off" name="TextoCorto" class="form-control"
                           type="text" placeholder="TextoCorto">
                     <label class="label">Precio</label>
                    <input required value="{{$juego->Precio}}" autocomplete="off" name="Precio" class="form-control"
                           type="text" placeholder="Precio">-->
                     <div class="textos">     
                            <label class="label">Nombre del Juego</label>       
                            <input required value="{{$juego->Nombre}}" autocomplete="off" name="Nombre" class="form-control"
                            type="text" placeholder="Nombre">
                            <label class="label">Género</label>
                            <input required value="{{$juego->Genero}}" autocomplete="off" name="Genero" class="form-control"
                            type="text" placeholder="Genero">                     
                            <label class="label">Descripción Breve</label>
                            <textarea required value="{{$juego->TextoCorto}}" autocomplete="off" name="TextoCorto" class="form-control"
                            type="text" placeholder="TextoCorto">{{$juego->TextoCorto}}</textarea>
                            <label class="label">Descripción Ampliada</label>
                            <textarea required value="{{$juego->Texto}}" autocomplete="off" name="Texto" class="form-control" rows="5";
                            type="text" placeholder="Texto">{{$juego->Texto}}</textarea>
                            <label class="label">Desarrollador</label>
                            <input required value="{{$juego->Estado}}" autocomplete="off" name="Estado" class="form-control"
                            type="text" placeholder="Estado">
                            <label class="label">Precio</label>
                            <input required value="{{$juego->Precio}}" autocomplete="off" name="Precio" class="form-control"
                            type="text" placeholder="Precio">
                     </div>
                     <div class="separador"></div>
                     <div class="media">
                            <label class="label">Link Video</label>
                            <iframe src="https://www.youtube.com/embed/{{$juego->Video}}" title="YouTube video player" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <input required value="{{$juego->Video}}" autocomplete="off" name="Video" class="form-control"
                            type="text" placeholder="Video">      
                            <label class="label">Caratula</label>
                            <img src="{{$juego->Caratula}}" class="img-fluid borde-luminoso caratula" alt="...">
                            <input required value="{{$juego->Caratula}}" autocomplete="off" name="Caratula" class="form-control"
                            type="text" placeholder="Caratula">  
                     </div>                   
                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("games.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection