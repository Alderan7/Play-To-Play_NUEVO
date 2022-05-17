@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
@section('content')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<div class="container margen">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-indicators">
            @for ($i = 0; $i < count($noticias); $i++)
                @if ($i==0)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                @else
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$i}}" aria-label="Slide {{$i+1}}"></button>
                @endif 
            @endfor
            </div>

            <div class="carousel-inner">
            @for ($i = 0; $i < count($noticias); $i++)
                @if ($i==0)
                    <div class="carousel-item active">
                        <img src="{{$noticias[$i]->image}}" class="d-block w-100" alt="...">
                        <a href="{{$noticias[$i]->link}}" class="info carousel-caption d-none d-md-block no-link">
                            <h5>{{$noticias[$i]->title}}</h5>
                            <div><p>{{$noticias[$i]->text}}</p></div>
                        </a>
                    </div>
                @else
                    <div class="carousel-item">
                        <img src="{{$noticias[$i]->image}}" class="d-block w-100" alt="...">
                        <a href="{{$noticias[$i]->link}}" class="info carousel-caption d-none d-md-block no-link">
                            <h5>{{$noticias[$i]->title}}</h5>
                            <div><p>{{$noticias[$i]->text}}</p></div>
                        </a>
                    </div>
                @endif 
            @endfor
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
                <a href="/game/{{ $item->id }}" class="btn-card"><img class="rounded mx-auto d-block imagen-juego" src="{{$item->cover}}"  alt="Card image cap">
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
                <a href="/project/{{ $item->id }}" class="btn-card"><img class="rounded mx-auto d-block imagen-juego" src="{{$item->cover}}"  alt="Card image cap">
                    <div class="nombre-juego">{{ $item->name }}</div>
                </a> 
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection