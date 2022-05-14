@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<div class="row margen">
        <div class="col-12">
            <form method="POST" action="{{route("games.store")}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="label">Genero</label>
                    <input required autocomplete="off" name="Genero" class="form-control"
                           type="text" placeholder="Genero">
                    <label class="label">IdProyecto</label>
                    <input required autocomplete="off" name="IdProyecto" class="form-control"
                           type="text" placeholder="IdProyecto">
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
                    <label class="label">Video</label>
                    <input required autocomplete="off" name="Video" class="form-control"
                            type="text" placeholder="Video">
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
                    <label class="label">Precio</label>
                    <input required autocomplete="off" name="Precio" class="form-control"
                            type="text" placeholder="Precio">
                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("games.index")}}">Volver al listado</a>
            </form>
        </div>
    </div>
@endsection

