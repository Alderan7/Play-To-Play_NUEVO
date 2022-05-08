@extends('layouts.header',
    ['title' => '', 'css_files' => ['planes'], 
    'js_files' => ['app']])
    
    
@section('content')

<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/planes.css') }}" rel="stylesheet">
<div class="login-completo contenedor-formulario container margen">
        <h4>SELECCIONA UN TIPO DE PLAN DE USUARIO</h4>
        <form method="GET" action="/plans/update">
            <h4><input id="usuario" type="radio" name="plan" value="usuario" checked><label class="selector">USUARIO BÁSICO</label></h4>
            <div class="row row-cols-1 row-cols-md-3 g-4 usuario" id="planesUsuario" >
            @foreach($userPlans as $item)
                <div class="col">                 
                    <div class="card h-100 reaccion-raton">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text">{{$item->description}}</p>
                            <input type="radio" name="plans-user" value="{{$item->id}}" class="tipos-de-planes-usuario"><label>SUSCRÍBETE</label>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$item->price}} €</small>
                        </div>
                    </div>               
                </div>   
            @endforeach                 
            </div>
            <button id="buttonUser">Seleccionar Plan</button>
            <div class="linea"></div>
            <h4><input id="creador" type="radio" name="plan" value="creador"><label class="selector">CREADOR/A DE CONTENIDO</label></h4>
            <div class="row row-cols-1 row-cols-md-3 g-4 creador opaco"  id="planesCreador">      
            @foreach($creatorPlans as $item)
                <div class="col">
                    <div class="card h-100 reaccion-raton">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                        <input type="radio" name="plans-creator"  value="{{$item->id}}"  class="tipos-de-planes-creador" disabled><label >SUSCRÍBETE</label>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{$item->price}} €</small>
                    </div>
                    </div>
                </div>
            @endforeach
            </div>
            <button id="buttonCreator" disabled>Seleccionar Plan</button>
        </form>   
    </div>  
    <script src="{{asset('js/plans.js')}}"></script>
@endsection