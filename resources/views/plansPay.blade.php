@extends('layouts.header',
    ['title' => '', 'css_files' => ['planes'], 
    'js_files' => ['app']])
    
@section('content')

<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/planes.css') }}" rel="stylesheet">
<link href="{{ asset('css/planesPay.css') }}" rel="stylesheet">


<form method="POST" action="{{ url("update_plan/{$Role_User[0]->id}")}}">
    @csrf
    <div class="card text-center contenedor-formulario container margen">
        <div class="card-header">
            <h2>CONFIRMA TU COMPRA</h2>
        </div>
        <div class="card-body">
            <form>

            <p class="card-text">Tipo de Plan: {{$tipoPlan}} </p>           
            <p class="card-text">Tipo de Plan que quieres contratar: {{$tipoPlanCreador}}{{$tipoPlanUsuario}}</p>
            <p class="card-text">Rol actual de usuario: {{$Role_User[0]->role_id}}</p>

            @if($tipoPlanUsuario==1)
            <input type="hidden" name="role_id" value="1">
            @elseif($tipoPlanUsuario==4)
            <input type="hidden" name="role_id" value="4">
            @elseif($tipoPlanUsuario==5)
            <input type="hidden" name="role_id" value="5">
            @elseif($tipoPlanCreador==2)
            <input type="hidden" name="role_id" value="2">
            @elseif($tipoPlanCreador==6)
            <input type="hidden" name="role_id" value="6">
            @elseif($tipoPlanCreador==7)
            <input type="hidden" name="role_id" value="7">
            @endif
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> 
            <button class="btn btn-primary">Pagar</button><a href="/plans" class="btn btn-primary">Cancelar</a>
        </div>
    </div>
</form>
<script src="{{asset('js/plans.js')}}"></script>
@endsection