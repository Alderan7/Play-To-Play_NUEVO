@extends('layouts.header',
    ['title' => '', 'css_files' => ['games'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/project.css') }}" rel="stylesheet">
<div id="project" class="margen container">  
<h1>{{$proyecto[0]->name}}</h1>
    <div class="container contenedor-juego">
        <div class="video-texto">
            <img src="{{$proyecto[0]->image}}" class="img-fluid borde-luminoso imagen" alt="...">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <p>{{$proyecto[0]->text1}}</p>
            </div>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <p>{{$proyecto[0]->text2}}</p>
            </div>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <p>{{$proyecto[0]->text3}}</p>
            </div>
        </div>
        <div class="caratula-pago">
            <img src="{{$proyecto[0]->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
            <!--<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">-->
            <form action="/paypal" method="post">     
                @csrf   
                <input type="hidden" name="tipo_compra" value="Proyecto">
                <input type="hidden" name="nombre" value="{{$proyecto[0]->name}}">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input  width="100" height="100" type="hidden" name="hosted_button_id" value="3H98AMZM399UQ">
                <div class="input-group mb-3 selector-pagos">
                <select class="form-select" id="inputGroupSelect02" name="precio" required>
                    <option value="{{$proyecto[0]->pledge1}}" selected>Aportación mínima: {{$proyecto[0]->pledge1}} €</option>
                    <option value="{{$proyecto[0]->pledge2}}">Aportación media: {{$proyecto[0]->pledge2}} €</option>
                    <option value="{{$proyecto[0]->pledge3}}">Aportación máxima: {{$proyecto[0]->pledge3}} €</option>
                </select>
                </div>
                <input type="hidden" name="currency_code" value="EUR">
                <input  width="260" height="60" type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" border="0" name="submit">
            </form>
        </div>
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
                                    @if (Auth::user()->id == $comentario -> id_user || Auth::user()->hasRole(['administrator']))  
                                    <form class="boton-eliminar" action="{{ url("project/{$comentario->id}") }}" method="post">
                                        @method("delete")
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash">Borrar</i>
                                        </button>
                                    </form>    
                                    @endif
                                </div>
                                <br>
                                <p>{{$comentario->commentary}}</p>                                
                            </div>
                    @empty        
                            <div class="comment mt-4 text-justify float-left">
                                <h2>Todavía no hay comentarios. ¡Dí lo que piensas de este proyecto!</h2>
                            </div>
                    @endforelse   
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                        <form class="formulario-comentario" id="algin-form" action="/project/{{$proyecto[0]->id}}" method="POST">
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
                            <input type="hidden" name="id_project" value="{{$proyecto[0]->id}}">
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