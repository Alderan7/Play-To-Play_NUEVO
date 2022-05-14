@extends('layouts.header',
    ['title' => '', 'css_files' => ['planes'], 
    'js_files' => ['app']])
    
@section('content')

<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/planes.css') }}" rel="stylesheet">
<link href="{{ asset('css/planesPay.css') }}" rel="stylesheet">
    
<form method="POST" action="{{ url('update_plan') }}">
    <div class="card text-center contenedor-formulario container margen">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <!--<h5 class="card-title">Confirma tu plan</h5>
            <p class="card-text">Tipo de Plan: {{$tipoPlan}} </p>
           
            <p class="card-text">Tipo de Plan Único: {{$tipoPlanCreador}}{{$tipoPlanUsuario}}</p>
            <p class="card-text">Id De Usuario: {{ Auth::user()->id }}</p>
            <p class="card-text">Rol actual de usuario: {{$rol[0]->role_id}}</p>-->
            <label class="label">role_id</label>
            <input required value="" autocomplete="off" name="role_id" class="form-control"
                type="text" placeholder="role_id">
            <label class="label">user_id</label>
            <input required value="" autocomplete="off" name="user_id" class="form-control"
                type="text" placeholder="user_id">
            <button class="btn btn-primary">Pagar</button><a href="/plans" class="btn btn-primary">Cancelar</a>
        </div>
    </div>
</form>
<script src="{{asset('js/plans.js')}}"></script>
@endsection

