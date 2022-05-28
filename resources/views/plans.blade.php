@extends('layouts.header',
    ['title' => '', 'css_files' => ['planes'], 
    'js_files' => ['app']])
    
    
@section('content')
<link href="{{ asset('css/planes.css') }}" rel="stylesheet">
<div class="login-completo contenedor-formulario container margen">
        <h4>SELECCIONA UN TIPO DE PLAN DE USUARIO</h4>
        <form method="GET" action="/plans/update">
            @if($suscripcion[0]->id == 1 || $suscripcion[0]->id == 4 || $suscripcion[0]->id == 5 )
            <h4><input id="usuario" type="radio" name="plan" value="usuario" checked><label class="selector">USUARIO BÁSICO</label></h4>
            <div class="row row-cols-1 row-cols-md-3 g-4 usuario" id="planesUsuario">
            @elseif($suscripcion[0]->id == 2 || $suscripcion[0]->id == 6 || $suscripcion[0]->id == 7 )
            <h4><input id="usuario" type="radio" name="plan" value="usuario"><label class="selector">USUARIO BÁSICO</label></h4>
            <div class="row row-cols-1 row-cols-md-3 g-4 usuario opaco" id="planesUsuario">
            @endif
            @foreach($userPlans as $item)
                <div class="col">                 
                    <div class="card h-100 reaccion-raton">
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <p class="card-text">{{$item->description}}</p>
                            @if($suscripcion[0]->id == 1 || $suscripcion[0]->id == 4 || $suscripcion[0]->id == 5 )
                                @if($item->role == $suscripcion[0]->id)
                                <input type="radio" name="plans-user" value="{{$item->id}}" class="tipos-de-planes-usuario" checked><label>SUSCRÍBETE</label>
                                @else
                                <input type="radio" name="plans-user" value="{{$item->id}}" class="tipos-de-planes-usuario"><label>SUSCRÍBETE</label>
                                @endif
                            @elseif($suscripcion[0]->id == 2 || $suscripcion[0]->id == 6 || $suscripcion[0]->id == 7 )
                                <input type="radio" name="plans-user" value="{{$item->id}}" class="tipos-de-planes-usuario" disabled><label>SUSCRÍBETE</label>
                            @endif                            
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{$item->price}} €</small>
                        </div>
                    </div>               
                </div>   
            @endforeach                 
            </div>
            @if($suscripcion[0]->id == 1 || $suscripcion[0]->id == 4 || $suscripcion[0]->id == 5 )
                <button id="buttonUser" class="boton btn">Seleccionar Plan</button>
            @elseif($suscripcion[0]->id == 2 || $suscripcion[0]->id == 6 || $suscripcion[0]->id == 7)
                <button id="buttonUser" class="boton btn" disabled>Seleccionar Plan</button>
            @endif  
                <div class="linea"></div>
            @if($suscripcion[0]->id == 1 || $suscripcion[0]->id == 4 || $suscripcion[0]->id == 5 )
            <h4><input id="creador" type="radio" name="plan" value="creador"><label class="selector">CREADOR/A DE CONTENIDO</label></h4>
            <div class="row row-cols-1 row-cols-md-3 g-4 creador opaco"  id="planesCreador"> 
            @elseif($suscripcion[0]->id == 2 || $suscripcion[0]->id == 6 || $suscripcion[0]->id == 7 )
            <h4><input id="creador" type="radio" name="plan" value="creador" checked><label class="selector">CREADOR/A DE CONTENIDO</label></h4>
            <div class="row row-cols-1 row-cols-md-3 g-4 creador"  id="planesCreador">    
            @endif  
            @foreach($creatorPlans as $item)
                <div class="col">
                    <div class="card h-100 reaccion-raton">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->name}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                        @if($suscripcion[0]->id == 1 || $suscripcion[0]->id == 4 || $suscripcion[0]->id == 5 )
                            <input type="radio" name="plans-creator"  value="{{$item->id}}"  class="tipos-de-planes-creador" disabled><label >SUSCRÍBETE</label>
                            @elseif($suscripcion[0]->id == 2 || $suscripcion[0]->id == 6 || $suscripcion[0]->id == 7 )
                                @if($item->role == $suscripcion[0]->id)
                                <input type="radio" name="plans-creator"  value="{{$item->id}}"  class="tipos-de-planes-creador" checked><label >SUSCRÍBETE</label>
                                @else
                                <input type="radio" name="plans-creator"  value="{{$item->id}}"  class="tipos-de-planes-creador"><label >SUSCRÍBETE</label>
                                @endif
                            @endif   
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{$item->price}} €</small>
                    </div>
                    </div>
                </div>
            @endforeach
            </div>  
            @if($suscripcion[0]->id == 1 || $suscripcion[0]->id == 4 || $suscripcion[0]->id == 5)
                <button id="buttonCreator" class="boton btn" disabled>Seleccionar Plan</button>
            @elseif($suscripcion[0]->id == 2 || $suscripcion[0]->id == 6 || $suscripcion[0]->id == 7 )
                <button id="buttonCreator" class="boton btn">Seleccionar Plan</button> 
            @endif            
            
        </form>   
    </div>  
    <script src="{{asset('js/plans.js')}}"></script>
@endsection