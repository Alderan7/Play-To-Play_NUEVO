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
        @guest
                <div class="caratula-pago en-biblioteca">
                    <img src="{{$juego[0]->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
                    <p class="no-login">Para poder jugar a este juego, <a href="{{ route('register') }}">{{ __('regístrate') }}</a> o <a href="{{ route('login') }}">{{ __('inicia sesión') }}</a>.</p>

                </div>  
        @else
                @if ($pertenece==true)
                <div class="caratula-pago en-biblioteca">
                    <img src="{{$juego[0]->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
                    <a href="/user" class="boton">Play</a>
                </div>        
                @elseif ($juego[0]->price==0.00)
                <div class="caratula-pago gratis">
                    <img src="{{$juego[0]->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
                    <h2>Gratis</h2>
                    <form action="{{ url("user") }}" method="post">
                        @csrf
                    <input type="hidden" name="id_game" value="{{$juego[0]->id}}">
                    <input type="hidden" name="id_player" value="{{ Auth::user()->id }}">  
                    <button type="submit" class="boton">Play</button>
                    </form>
                </div>
                @else
                <div v-else class="caratula-pago">
                    <img src="{{$juego[0]->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
                    <h2>{{$juego[0]->price}}€</h2>
                    

                    <!--Este es el código original de Paypal para poder pagar-->
                        <!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">-->
                    <form action="/paypal" method="post">     
                        @csrf   
                        <input type="hidden" name="tipo_compra" value="Juego">
                        <input type="hidden" name="codigo" value="{{$juego[0]->id}}">
                        <input type="hidden" name="precio" value="{{$juego[0]->price}}">
                        <input type="hidden" name="nombre" value="{{$juego[0]->name}}">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input  width="100" height="100" type="hidden" name="hosted_button_id" value="3H98AMZM399UQ">
                        <input type="hidden" name="currency_code" value="EUR">
                        <input  width="260" height="60" type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" border="0" name="submit">
                    </form>
                </div>  
                @endif
        @endguest        
        <div class="comentarios">
        <h1>Comentarios</h1>
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-md-6 col-12 pb-4 contenedor-comentarios">
                    @forelse ($comentarios as $comentario)  
                            <div class="comment mt-4 text-justify float-left">
                                <div>
                                @if($comentario->avatar!=null)
                                <img src="http://127.0.0.1/public/images/{{$comentario->avatar}}" alt="" class="rounded-circle" width="40" height="40">
                                @else
                                <img src="http://127.0.0.1/public/images/default.svg" alt="" class="rounded-circle" width="40" height="40">
                                @endif
                                    <h4>{{$comentario->name}}</h4>                                                               
                                    <span>{{$comentario->created_at}}</span>
                                    @guest
                                    @else
                                        @if (Auth::user()->id == $comentario -> id_user || Auth::user()->hasRole(['administrator']))  
                                        <form class="boton-eliminar" action="{{ url("game/{$comentario->id}") }}" method="post">
                                            @method("delete")
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-trash">Borrar</i>
                                            </button>
                                        </form>    
                                        @endif
                                    @endguest
                                </div>
                                <br>
                                <p>{{$comentario->commentary}}</p>                                
                            </div>
                    @empty        
                            <div class="comment mt-4 text-justify float-left">
                                <h2>Todavía no hay comentarios. ¡Dí lo que piensas de este juego!</h2>
                            </div>
                    @endforelse   
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                        <form class="formulario-comentario" id="algin-form" action="/game/{{$juego[0]->id}}" method="POST">
                        @csrf
                            <div class="form-group formulario-comentario">
                                <h4>Deja un comentario</h4>
                                <h5 for="message">Mensaje</h5>                               
                                <textarea id="msg" name="commentary" cols="30" rows="5" class="form-control" style="background-color: black;" required></textarea>
                            </div> 
                            @guest
                            <div class="form-group">
                                <p class="no-login">Para poder dejar un comentario, <a href="{{ route('register') }}">{{ __('regístrate') }}</a> o <a href="{{ route('login') }}">{{ __('inicia sesión') }}</a>.</p>
                            </div>
                            @else     
                                <input type="hidden" name="id_game" value="{{$juego[0]->id}}">
                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">                  
                            <div class="form-group">
                                <button type="submit" id="post" class="boton">Comentar</button>
                            </div>
                            @endguest
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection