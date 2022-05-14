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
        <div class="col-12">
            <a href="{{route("projects.create")}}" class="btn btn-success mb-2">Agregar</a>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Carátula</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
                </thead>
                <tbody>
                @foreach($proyectos as $proyecto)
                    <tr>
                        <td>{{$proyecto->name}}</td>
                        <td><img class="imagen-tabla" src="{{$proyecto->cover}}"></td>           
                       
                        <td>
                            <a class="btn btn-warning" href="{{route("projects.edit",[$proyecto])}}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <form action="{{route("projects.destroy", [$proyecto])}}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <!--{{$proyectos->links()}}-->
            <div class="container navegador pagination-wrapper">
                <!-- a Tag for previous page -->
                <a href="{{$proyectos->previousPageUrl()}}">
                    Atrás<!-- You can insert logo or text here -->
                </a>
                @for($i=0;$i<=$proyectos->lastPage();$i++)
                    <!-- a Tag for another page -->
                    <a href="{{$proyectos->url($i)}}">{{$i}}</a>
                @endfor
                <!-- a Tag for next page -->
                <a href="{{$proyectos->nextPageUrl()}}">
                    <!-- You can insert logo or text here -->
                    Adelante
                </a>

            </div>
        </div>
    </div>
@endsection