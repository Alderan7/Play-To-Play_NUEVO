@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/niveles.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/tables.css') }}" rel="stylesheet">
<div class="margen container">
<h1>Panel de administración de Proyectos</h1>
        <div class="col-12">
            <a href="{{route("projects.create")}}" class="btn btn-success mb-2">Agregar nuevo Proyecto</a>
            <table class="container">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Carátula</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td class="nombre">{{$project->name}}</td>
                        <td><img class="imagen-tabla" src="{{$project->cover}}"></td>           
                       
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
                </tbody>
            </table>
            <!--{{$projects->links()}}-->
            <div class="container navegador pagination-wrapper">
                <!-- a Tag for previous page -->
                <a href="{{$projects->previousPageUrl()}}">
                    Atrás<!-- You can insert logo or text here -->
                </a>
                @for($i=0;$i<=$projects->lastPage();$i++)
                    <!-- a Tag for another page -->
                    <a href="{{$projects->url($i)}}">{{$i}}</a>
                @endfor
                <!-- a Tag for next page -->
                <a href="{{$projects->nextPageUrl()}}">
                    <!-- You can insert logo or text here -->
                    Adelante
                </a>

            </div>
        </div>
    </div>
@endsection