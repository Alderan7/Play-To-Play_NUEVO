@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
@php
    $url = config('global.storage')
@endphp
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/niveles.css') }}" rel="stylesheet">
<link href="{{ asset('css/tables.css') }}" rel="stylesheet">
<div class="margen container">
<div class="encabezado-juegos">
<h1>Panel de administración de Proyectos</h1>
    </div>

        <div class="col-12">
            <div class="boton-centrado">
            @if (Auth::user()->hasRole(['administrator']) || Auth::user()->hasRole(['creator-all']) || (Auth::user()->hasRole(['creator']) && $total_projects<5) || (Auth::user()->hasRole(['creator-mid']) && $total_projects<10)) 
                <a href="{{route("projects.create")}}" class="btn btn-success mb-2 boton-nuevo">AÑADIR NUEVO PROYECTO</a>
            @endif
            </div>
            <table class="container">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Carátula</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @if (Auth::user()->hasRole(['creator']) ||  Auth::user()->hasRole(['creator-mid']) ||  Auth::user()->hasRole(['creator-all']))      
                    @foreach($projects_creator as $project)
                        <tr>
                            <td class="nombre">{{$project->name}}</td>
                            <td><img class="imagen-tabla" src="{{$url}}{{$project->cover}}"></td>           
                        
                            <td>
                                <a class="btn btn-warning boton" href="{{route("projects.edit",[$project])}}">
                                    <i class="fa fa-edit">Editar</i>
                                </a>
                                <form action="{{route("projects.destroy", [$project])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger boton">
                                        <i class="fa fa-trash">Eliminar</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                @if (Auth::user()->hasRole(['administrator']))  
                    @foreach($projects as $project)
                        <tr>
                            <td class="nombre">{{$project->name}}</td>
                            <td><img class="imagen-tabla" src="{{$url}}{{$project->cover}}"></td>           
                        
                            <td>
                                <a class="btn btn-warning boton" href="{{route("projects.edit",[$project])}}">
                                    <i class="fa fa-edit">Editar</i>
                                </a>
                                <form action="{{route("projects.destroy", [$project])}}" method="post">
                                    @method("delete")
                                    @csrf
                                    <button type="submit" class="btn btn-danger boton">
                                        <i class="fa fa-trash">Eliminar</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>


            @if($projects->lastPage()!=1)
                @if (Auth::user()->hasRole(['administrator']))
                <div class="container navegador pagination-wrapper">
                    <a class="enlace-flecha" href="{{$projects->previousPageUrl()}}">
                        <img class="flechas" src="../images/playInverso.svg">
                    </a>
                    @for($i=1;$i<=$projects->lastPage();$i++)
                        @if($projects->currentPage()==$i)
                            <a class="pagina-actual" href="{{$projects->url($i)}}">{{$i}}</a>
                        @else
                            <a class="paginas-navegador" href="{{$projects->url($i)}}">{{$i}}</a>
                        @endif                    
                    @endfor
                    <a class="enlace-flecha" href="{{$projects->nextPageUrl()}}">
                        <img class="flechas" src="../images/play.svg">
                    </a>
                </div>
                @endif
            @endif
        </div>
    </div>
@endsection