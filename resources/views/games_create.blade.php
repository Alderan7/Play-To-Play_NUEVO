@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])
    
@section('content')
<link href="{{ asset('css/games.css') }}" rel="stylesheet">
<link href="{{ asset('css/login.css') }}" rel="stylesheet">
<link href="{{ asset('css/edit_game.css') }}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="loader-page"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="-5 0 50 50" width="40pt" height="40pt"><defs><clipPath id="_clipPath_sZv9G6xcZeQw4DST1umJy0k0e2VATlNl"><rect width="50" height="50"/></clipPath></defs><g clip-path="url(#_clipPath_sZv9G6xcZeQw4DST1umJy0k0e2VATlNl)"><image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAyCAYAAAAus5mQAAADuUlEQVRoQ82ZTahVZRSGn1ekkIyQTAgEIwhyYKTcQSNBECfhyIFIXbMMqSAVbVDeK14HanKvP3UngYr96qSJQ5sUNO0PCkIQQfwZ+FOQZgrVkhe+Dftuz95nn+vZ+5wP7mzfbz/nXd9691rrU0QI+BLYANwD3gc+lhQMwVJE7AN2FVh+AN6Q9OugGQ14DXgy/T0BnARWAf8CU8CEJCs7kGVAh/KmpIUZQUS8BhwBFgAXgE2Svh8EYUdAg0TEIp9FYH0C+xTYIenPNkFLAXNqrgEM9zRwHdgu6VRbkF0Bk5qPAx8CbwPO+m+AzZIuNw1aCzCn5kvA58BzwN/AbuAjSf83BdoTYFLzUWAM+ACYC/wCbGzKknoGzKm5NKk5kizpcLKkf/qp5qwBk5pzgK3AfmAecBF4XdK3/YKsBIwIAyyzF0q6VfbSiFiSM3g/9gWwrR+WVOWDztbvgJWAwzYBHJL0XwXoRuBoMvgbyTcNO+tVBbgc+Kmw82/AqCQnRscVEU85s1Px4Wccbofd4e95VQHaoM922NEK+gszJqk0ISIib/B3chHoyZJmA5gxW5EtkmzaZWra4A8A7ySDt/JWszQCxY0eBjDb67QzWZLPXBlo3uAdAR+B8aoIZBv1A9B7/QG8J8mlWhlk0eBrWVK/ADMoJ8SbklyilYHmDd7PfJUKkI4R6DegX3gX2AtMlllS8td30/m0wd8Edkr6rIkzWCaWLckJ4fahTM2iwT8QgSYUzMPYUqaTJbn6KQMdTYnjCt7W5QhMOQJNA2ZArhtdP1ZZUtHgHYF1bQFmoG7ArE7pSgZ/AlgMXGkb0CF/RtKlLpA2+DPuLtsGNNfzks51AZyfvuEjbQNOS3L9WDfEV9sCrJMk7stdqr2S6FtJkro282qqkGwzM4y+SQXr1I7OVHeJHrV4tWLUvXzqPLh6LBUb/tR5QDBj9VvB2RQLnlK4f2m0WHC51VGBTI6IeCT10x71uZ/uWvD6f/uhYKUCfklEDKRg7apARAyk5K9Vshe+qY00TSuAHwtJVcc6Wms7PVVw27l6KBv3dLgN+QJwXtLtioKz/dFH1Qc9Zx2DHR51qTrcndliXkzjNw/d99Tpdev8+OyZnsdvEeH+djxd+AzXALNguMMzAk6GexB4a+iG6BHxMnAsXUP4VsrXEJ7HtLJ6ucjx3MUFweAvciJiE+Ch+FBchf0FuIt61oVH4TJx0l3+oC8Tv3YHXzhQnqf47uP3Vg5axUt8Bn0F675gLfAzcBz4ZFgutO8DtMe8UgKUFzYAAAAASUVORK5CYII=" x="4.809" y="0" width="40.381" height="50" style=""/></g></svg></div>
<div class="margen container">
    <div class="encabezado-juegos">
        <h1>Crear nuevo Juego</h1>       
    </div>
        <div class="col-12">
            <form method="POST" id="fileUploadForm" action="{{route("games.store")}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="label">Nombre</label>       
                    <input required autocomplete="off" name="name" class="form-control"
                            type="text" placeholder="Nombre del juego" required>
                    <label class="label">Genero</label>
                    
                    <select class="form-control" name="genre" required>
                        <option value="" selected disabled>Seleccione un género...</option>
                    @foreach($generos as $genero)
                        <option value="{{$genero->id}}">{{$genero->name}}</option>
                    @endforeach
                    </select>
                    <label class="label">Carátula</label>
                    <input required autocomplete="off" name="cover" class="form-control"
                            type="file" placeholder="Carátula del juego" required>
                    <label class="label">Video</label>
                    <input required autocomplete="off" name="video" class="form-control"
                            type="text" placeholder="Video del juego en youtube." required>
                    <label class="label">Texto de Introducción</label>
                    <textarea rows="4" cols="50" class="form-control" name="text1" placeholder="Texto de introducción del juego." required></textarea>
                    <label class="label">Texto de ampliación 1</label>
                    <textarea rows="4" cols="50" class="form-control" name="text2" placeholder="Texto opcional de ampliación de la información." ></textarea>
                    <label class="label">Texto de ampliación 2</label>
                    <textarea rows="4" cols="50" class="form-control" name="text3" placeholder="Texto opcional de ampliación de la información." ></textarea>
                    <label class="label">Precio</label>
                    <input required autocomplete="off" name="price" class="form-control"
                            type="text" placeholder="Precio del juego" required>
                    <label class="label">Archivos del Juego</label>
                    <input required autocomplete="off" name="archives" class="form-control"
                            type="file" placeholder="Archivos necesarios para ejecutar el juego." required>
                </div>
                <div class="botones-juego">
                    <button class="btn btn-success">Guardar</button>
                    <a class="btn btn-primary" href="{{route("games.index")}}">Volver al listado</a>
                </div>
            </form>
        </div>
    </div>
<script src="{{asset('js/loader.js')}}"></script>
@endsection

