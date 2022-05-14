@extends('layouts.header',
    ['title' => '', 'css_files' => ['contacto'], 
    'js_files' => ['app']])

@section('content')
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<link href="{{ asset('css/login.css') }}" rel="stylesheet">

<div class="container margen">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header titulo">{{ __('CONTACTO') }}</div>

                <div class="card-body contenedor-formulario">
                    <form method="POST" action="">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Nombre') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control" name="email" required autocomplete="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Teléfono') }}</label>

                            <div class="col-md-7">
                                <input id="telefono" type="tel" class="form-control" name="telefono" required autocomplete="tel">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Tipo de Usuario') }}</label>
                          <div class="col-md-7">
                              <div class="input-group mb-3">
                                <select class="form-select" id="inputGroupSelect02">
                                  <option selected>Selecciona el tipo de plan</option>
                                  <option value="1">Gratuito - Usuario</option>
                                  <option value="2">Novedades - Usuario</option>
                                  <option value="3">Catálogo - Usuario</option>
                                  <option value="4">Cinco - Creador</option>
                                  <option value="5">Diez - Creador</option>
                                  <option value="6">Ilimitado - Creador</option>
                                </select>
                                <label class="input-group-text" for="inputGroupSelect02">Planes</label>
                              </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Mensaje') }}</label>
                            <div class="col-md-7">
                              <textarea rows="4" cols="50" class="form-control" id="mensaje" name="mensaje">Introduce tu mensaje</textarea>
                            </div>
                        </div>

                        <div class="row mb-0 div-boton">
                            <div class="col-md-6 offset-md-4 div-boton">
                                <button type="submit" class="btn btn-primary boton">
                                    {{ __('ENVIAR') }}
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