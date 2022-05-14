@extends('layouts.header')

@section('content')
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<link href="{{ asset('css/edit_profile.css') }}" rel="stylesheet">

<div class="container margen">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header titulo">{{ __('MODIFICA LOS DATOS DE TU PERFIL') }}</div>

                <div class="card-body contenedor-formulario">
                    <form method="POST" action="{{ url('store_profile') }}">
                        @csrf                           

                        <div class="row mb-3">                            
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Avatar Actual') }}</label>                            
                            <div class="col-md-6">
                            @if (is_null($usuario->Avatar))
                                <img class="avatar" src="http://127.0.0.1/public/images/default.svg">
                            @else
                                <img class="avatar" src="'http://127.0.0.1/public/images/' + {{ $usuario->Avatar }}">
                            @endif
                        </div>

                        <div class="row mb-3">                            
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Elige tu Avatar') }}</label>                                                        
                            <div class="col-md-6">
                            <input required autocomplete="off" name="Avatar" class="form-control"
                            type="file" placeholder="Avatar">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--<div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Repetir Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>-->

                        <div class="row mb-0 div-boton">
                            <div class="col-md-6 offset-md-4 div-boton">
                                <button type="submit" class="btn btn-primary boton-actualizar">
                                    {{ __('ACTUALIZAR PERFIL') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
