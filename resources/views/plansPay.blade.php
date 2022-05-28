@extends('layouts.header',
    ['title' => '', 'css_files' => ['planes'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/planes.css') }}" rel="stylesheet">
<link href="{{ asset('css/planesPay.css') }}" rel="stylesheet">
<form method="POST" action="{{ url("update_plan/{$Role_User[0]->id}")}}">
    @csrf
    <div class="card text-center contenedor-formulario container margen">
        <div class="card-header">
            <h2>CONFIRMA TU COMPRA</h2>
        </div>
        @if($Role_User[0]->role_id != $tipoPlanNuevo)
        <div class="card-body">       
            <div class="desc_plan_actual">
            <h3 class="card-text titulo-plan">PLAN ACTUAL DE SUSCRIPCIÓN:</h3>
                <p class="card-text">Plan: <span>{{$info_actual[0]->name}}</span></p>           
                <p class="card-text"><span>{{$info_actual[0]->description}}</span></p>
                <p class="card-text">Precio Actual: <span>{{$info_actual[0]->price}}€</span></p>
            </div>            
            <div class="desc_plan_nuevo">
            <h2 class="card-text titulo-plan">NUEVO PLAN DE SUSCRIPCIÓN:</h2>
                <p class="card-text">Plan: <span>{{$info_nuevo[0]->name}}</p>           
                <p class="card-text"><span>{{$info_nuevo[0]->description}}</span></p>
                <p class="card-text">Precio Nueva Suscripción: <span>{{$info_nuevo[0]->price}}€</span></p>
            </div>  
            <input type="hidden" name="role_id" value="{{$tipoPlanNuevo}}">
            <input type="hidden" name="role_user" value="{{$Role_User[0]->role_id}}">
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
            <input  width="260" height="60" type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/buy-logo-large.png" alt="Buy now with PayPal" border="0" name="submit">
            <br>
            <a href="/plans" class="boton btn">Cancelar</a>

        </div>
        @else
        <div class="card-body">
            <p>AVISO: Ya dispones de este plan contratado</p>
            <a href="/plans" class="boton btn">Volver</a>
        </div>
        @endif
    </div>
</form>
<script src="{{asset('js/plans.js')}}"></script>
@endsection