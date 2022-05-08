@extends('layouts.header',
    ['title' => '', 'css_files' => ['game'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/game.css') }}" rel="stylesheet">
<div id="game" class="margen container">  
    <div class="container contenedor-juego">
        <div class="video-texto">
            <h1>{{$juego[0]->name}}</h1>
            <iframe src="https://www.youtube.com/embed/{{$juego[0]->video}}" title="YouTube video player" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <p>{{$juego[0]->text2}}</p>
            </div>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <p>{{$juego[0]->text1}}</p>
            </div>
        </div>
        @if ($juego[0]->price==0.00)
        <div class="caratula-pago gratis">
            <img src="{{$juego[0]->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
            <h2>Gratis</h2>
            <button class="boton">Play</button>
        </div>
        @elseif ($pertenece==true)
        <div class="caratula-pago en-biblioteca">
            <img src="{{$juego[0]->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
            <button class="boton">Play</button>
        </div>
        @else
        <div v-else class="caratula-pago">
            <img src="{{$juego[0]->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
            <h2>{{$juego[0]->price}}€</h2>
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input  width="100" height="100" type="hidden" name="hosted_button_id" value="3H98AMZM399UQ">

                <input type="hidden" name="currency_code" value="EUR">
                <input  width="260" height="60" type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" border="0" name="submit">

            </form>
        </div>  
        @endif
    </div>
</div>

@endsection