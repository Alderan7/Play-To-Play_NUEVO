@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<div class="row margen">
        <div class="col-12">
            <form method="POST" action="{{route("projects.update", [$proyecto])}}">
                @method("PUT")
                @csrf
                <div class="form-group">
                    <label class="label">Genero</label>
                    <input required value="{{$proyecto->Genero}}" autocomplete="off" name="Genero" class="form-control"
                           type="text" placeholder="Genero">
                    <label class="label">Nombre</label>       
                    <input required value="{{$proyecto->Nombre}}" autocomplete="off" name="Nombre" class="form-control"
                           type="text" placeholder="Nombre">
                    <label class="label">Estado</label>
                    <input required value="{{$proyecto->Estado}}" autocomplete="off" name="Estado" class="form-control"
                           type="text" placeholder="Estado">
                    <label class="label">Banner</label>
                    <input required value="{{$proyecto->Banner}}" autocomplete="off" name="Banner" class="form-control"
                           type="text" placeholder="Banner">
                    <label class="label">Financiado</label>
                    <input required value="{{$proyecto->Financiado}}" autocomplete="off" name="Financiado" class="form-control"
                           type="text" placeholder="Financiado">
                    <label class="label">Texto</label>
                    <input required value="{{$proyecto->Texto}}" autocomplete="off" name="Texto" class="form-control"
                           type="text" placeholder="Texto">
                    <label class="label">Caratula</label>
                    <input required value="{{$proyecto->Caratula}}" autocomplete="off" name="Caratula" class="form-control"
                           type="text" placeholder="Caratula">
                    <label class="label">TextoCorto</label>
                    <input required value="{{$proyecto->TextoCorto}}" autocomplete="off" name="TextoCorto" class="form-control"
                           type="text" placeholder="TextoCorto">
                </div>
                <button class="btn btn-success">Guardar</button>
                <a class="btn btn-primary" href="{{route("proyectos.index")}}">Volver</a>
            </form>
        </div>
    </div>
@endsection