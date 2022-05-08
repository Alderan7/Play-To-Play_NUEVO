@extends('layouts.header',
    ['title' => '', 'css_files' => ['games'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/project.css') }}" rel="stylesheet">
<div id="project" class="margen container">  
    <div class="container contenedor-juego">
        <div class="video-texto">
            <h1>{{$proyecto[0]->name}}</h1>
            <img src="{{$proyecto[0]->image}}" class="img-fluid borde-luminoso imagen" alt="...">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <p>{{$proyecto[0]->text2}}</p>
            </div>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
                <p>{{$proyecto[0]->text1}}</p>
            </div>
        </div>
        <div class="caratula-pago">
            <img src="{{$proyecto[0]->cover}}" class="img-fluid borde-luminoso caratula" alt="...">
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input  width="100" height="100" type="hidden" name="hosted_button_id" value="3H98AMZM399UQ">

                <div class="input-group mb-3 selector-pagos">
                <select class="form-select" id="inputGroupSelect02">
                    <option selected>Choose...</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <label class="input-group-text" for="inputGroupSelect02">Options</label>
                </div>
                <input type="hidden" name="currency_code" value="EUR">
                <input  width="260" height="60" type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" border="0" name="submit">
            </form>
        </div>
    </div>
</div>
@endsection