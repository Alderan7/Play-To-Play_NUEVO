@extends('layouts.header')

@section('content')
@php
    $url = config('global.storage')
@endphp
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<link href="{{ asset('css/edit_profile.css') }}" rel="stylesheet">
<div class="container margen">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header titulo">{{ __('MODIFICA LOS DATOS DE TU PERFIL') }}</div>

                <div class="card-body contenedor-formulario">
                <form method="POST" action="/user/update" enctype="multipart/form-data">
                        @csrf                        
                        <div class="row mb-3">                            
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Avatar Actual') }}</label>                            
                            <div class="col-md-6">
                            @if (is_null($usuario->avatar))
                                <img class="avatar" src="{{url('storage/images/'.'default.svg')}}">
                            @else
                                <img class="avatar" src="{{url('storage/images/'.$usuario->avatar )}}">
                            @endif
                        </div>
                        <div class="row mb-3">                            
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Elige tu Avatar') }}</label>                                                        
                            <div class="col-md-6">
                            <input autocomplete="off" id="avatar" name="avatar" class="form-control"
                            type="file">  
                            </div>                            
                        </div>
                        <div class="row mb-3">                            
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuario->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">                            
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Contraseña') }}</label>
                            <div class="col-md-6">
                                <a class="form-control resetear-contraseña" href="/user-password-reset">{{ __('Cambiar Contraseña') }}</a>
                            </div>
                        </div>                        
                        <div class="row mb-0 div-boton">
                            <div class="col-md-6 offset-md-4 div-boton">
                                <button type="submit" class="btn btn-primary boton-actualizar">
                                    {{ __('ACTUALIZAR PERFIL') }}
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4 div-boton">
                                <a href="/home" class="btn cancelar boton-actualizar">
                                    {{ __('CANCELAR') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
