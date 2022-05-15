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
<h1>Crear nuevo Proyecto</h1>
        <div class="col-12">
            <form method="POST" action="{{route("projects.store")}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="label">Genero</label><br>
                    <!--<input required autocomplete="off" name="Genero" class="form-control"
                           type="text" placeholder="Genero">-->
                    <select name="genero">
                        <option value="0" selected disabled>Seleccione un género...</option>
                    @foreach($generos as $genero)
                        <option value="{{$genero->id}}">{{$genero->name}}</option>
                    @endforeach
                    </select>
                    <br>
                    <label class="label">Creador</label>
                    <input required autocomplete="off" name="Creador" class="form-control"
                           type="text" placeholder="Creador">
                    <label class="label">Nombre</label>       
                    <input required autocomplete="off" name="Nombre" class="form-control"
                            type="text" placeholder="Nombre">
                    <label class="label">Estado</label>
                    <input required autocomplete="off" name="Estado" class="form-control"
                            type="text" placeholder="Estado">
                    <label class="label">Banner</label>
                    <!--<input required autocomplete="off" name="Banner" class="form-control"
                            type="text" placeholder="Banner">-->
                    <input required autocomplete="off" name="Banner" class="form-control"
                            type="file" placeholder="Banner">
                    <label class="label">Financiado</label>
                    <input required autocomplete="off" name="Financiado" class="form-control"
                            type="text" placeholder="Financiado">
                    <label class="label">Texto</label>
                    <input required autocomplete="off" name="Texto" class="form-control"
                            type="text" placeholder="Texto">
                    <label class="label">Caratula</label>
                    <!--<input required autocomplete="off" name="Caratula" class="form-control"
                            type="text" placeholder="Caratula">-->
                    <input required autocomplete="off" name="Caratula" class="form-control"
                            type="file" placeholder="Caratula">     
                    <label class="label">TextoCorto</label>
                    <input required autocomplete="off" name="TextoCorto" class="form-control"
                            type="text" placeholder="TextoCorto">
                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("projects.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection

