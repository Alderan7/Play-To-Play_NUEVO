@extends('layouts.header',
    ['title' => '', 'css_files' => ['contacto'], 
    'js_files' => ['app']])

@section('content')
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="loader-page"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="-5 0 50 50" width="40pt" height="40pt"><defs><clipPath id="_clipPath_sZv9G6xcZeQw4DST1umJy0k0e2VATlNl"><rect width="50" height="50"/></clipPath></defs><g clip-path="url(#_clipPath_sZv9G6xcZeQw4DST1umJy0k0e2VATlNl)"><image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAyCAYAAAAus5mQAAADuUlEQVRoQ82ZTahVZRSGn1ekkIyQTAgEIwhyYKTcQSNBECfhyIFIXbMMqSAVbVDeK14HanKvP3UngYr96qSJQ5sUNO0PCkIQQfwZ+FOQZgrVkhe+Dftuz95nn+vZ+5wP7mzfbz/nXd9691rrU0QI+BLYANwD3gc+lhQMwVJE7AN2FVh+AN6Q9OugGQ14DXgy/T0BnARWAf8CU8CEJCs7kGVAh/KmpIUZQUS8BhwBFgAXgE2Svh8EYUdAg0TEIp9FYH0C+xTYIenPNkFLAXNqrgEM9zRwHdgu6VRbkF0Bk5qPAx8CbwPO+m+AzZIuNw1aCzCn5kvA58BzwN/AbuAjSf83BdoTYFLzUWAM+ACYC/wCbGzKknoGzKm5NKk5kizpcLKkf/qp5qwBk5pzgK3AfmAecBF4XdK3/YKsBIwIAyyzF0q6VfbSiFiSM3g/9gWwrR+WVOWDztbvgJWAwzYBHJL0XwXoRuBoMvgbyTcNO+tVBbgc+Kmw82/AqCQnRscVEU85s1Px4Wccbofd4e95VQHaoM922NEK+gszJqk0ISIib/B3chHoyZJmA5gxW5EtkmzaZWra4A8A7ySDt/JWszQCxY0eBjDb67QzWZLPXBlo3uAdAR+B8aoIZBv1A9B7/QG8J8mlWhlk0eBrWVK/ADMoJ8SbklyilYHmDd7PfJUKkI4R6DegX3gX2AtMlllS8td30/m0wd8Edkr6rIkzWCaWLckJ4fahTM2iwT8QgSYUzMPYUqaTJbn6KQMdTYnjCt7W5QhMOQJNA2ZArhtdP1ZZUtHgHYF1bQFmoG7ArE7pSgZ/AlgMXGkb0CF/RtKlLpA2+DPuLtsGNNfzks51AZyfvuEjbQNOS3L9WDfEV9sCrJMk7stdqr2S6FtJkro282qqkGwzM4y+SQXr1I7OVHeJHrV4tWLUvXzqPLh6LBUb/tR5QDBj9VvB2RQLnlK4f2m0WHC51VGBTI6IeCT10x71uZ/uWvD6f/uhYKUCfklEDKRg7apARAyk5K9Vshe+qY00TSuAHwtJVcc6Wms7PVVw27l6KBv3dLgN+QJwXtLtioKz/dFH1Qc9Zx2DHR51qTrcndliXkzjNw/d99Tpdev8+OyZnsdvEeH+djxd+AzXALNguMMzAk6GexB4a+iG6BHxMnAsXUP4VsrXEJ7HtLJ6ucjx3MUFweAvciJiE+Ch+FBchf0FuIt61oVH4TJx0l3+oC8Tv3YHXzhQnqf47uP3Vg5axUt8Bn0F675gLfAzcBz4ZFgutO8DtMe8UgKUFzYAAAAASUVORK5CYII=" x="4.809" y="0" width="40.381" height="50" style=""/></g></svg></div>
<div class="container margen">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header titulo">{{ __('CONTACTO') }}</div>

                <div class="card-body contenedor-formulario">
                    <form method="POST" id="fileUploadForm" action="/send-mail">
                        @csrf
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-start">{{ __('Nombre') }}</label>

                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" required autocomplete="name" autofocus>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Correo Electrónico') }}</label>

                            <div class="col-md-7">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-start">{{ __('Teléfono') }}</label>

                            <div class="col-md-7">
                                <input id="telefono" type="tel" class="form-control @error('telefono') is-invalid @enderror" name="telefono" required autocomplete="tel">
                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipo" class="col-md-4 col-form-label text-md-start">{{ __('Tipo de Usuario') }}</label>
                          <div class="col-md-7">
                              <div class="input-group mb-3">
                                <select class="form-select @error('tipo') is-invalid @enderror" name="tipo" id="inputGroupSelect02">
                                  <option selected disabled>Selecciona el tipo de plan</option>
                                  <option value="Gratuito">Gratuito - Usuario</option>
                                  <option value="Novedades">Novedades - Usuario</option>
                                  <option value="Catálogo">Catálogo - Usuario</option>
                                  <option value="Cinco">Cinco - Creador</option>
                                  <option value="Diez">Diez - Creador</option>
                                  <option value="Ilimitado">Ilimitado - Creador</option>
                                </select>                                
                                <label class="input-group-text" for="inputGroupSelect02">Planes</label>
                                @error('tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>                              
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="mensaje" class="col-md-4 col-sm-5 col-form-label text-md-start">{{ __('Mensaje') }}</label>
                            <div class="col-md-7 col-sm-5">
                              <textarea rows="4" cols="50" class="form-control @error('mensaje') is-invalid @enderror" id="mensaje" name="mensaje" placeholder="Introduce tu mensaje"></textarea>
                              @error('mensaje')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
<script src="{{asset('js/loader.js')}}"></script>
@endsection