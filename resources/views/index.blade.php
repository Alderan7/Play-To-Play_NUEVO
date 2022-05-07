@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])

@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<div class="container margen">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="{{$noticias[0]->image}}" class="d-block w-100" alt="...">
                    <div class="info carousel-caption d-none d-md-block">
                        <h5>{{$noticias[0]->title}}</h5>
                        <a href="#"><p>{{$noticias[0]->text}}</p></a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{$noticias[1]->image}}" class="d-block w-100" alt="...">
                    <div class="info carousel-caption d-none d-md-block">
                        <h5>{{$noticias[1]->title}}</h5>
                        <p>{{$noticias[1]->text}}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{$noticias[2]->image}}" class="d-block w-100" alt="...">
                    <div class="info carousel-caption d-none d-md-block">
                        <h5>{{$noticias[2]->title}}</h5>
                        <p>{{$noticias[2]->text}}</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <h3>JUEGOS RECIENTES</h3>
        <div class="galeria">
            @foreach($juegos as $item)
            <div class="juego">
                <div class="interno">
                <a href="#" class="btn-card"><img class="rounded mx-auto d-block imagen-juego" src="{{$item->cover}}"  alt="Card image cap">
                    <div class="nombre-juego">{{ $item->name }}</div>
                    <div class="precio-juego">{{ $item->price }}€</div>
                </a> 
                </div>
            </div>
            @endforeach
        </div>
        <h3>PROYECTOS RECIENTES</h3>
        <div class="galeria">
        @foreach($proyectos as $item)
            <div class="juego">
                <div class="interno">
                <a href="#" class="btn-card"><img class="rounded mx-auto d-block imagen-juego" src="{{$item->cover}}"  alt="Card image cap">
                    <div class="nombre-juego">{{ $item->name }}</div>
                </a> 
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection