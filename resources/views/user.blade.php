@extends('layouts.header',
    ['title' => '', 'css_files' => ['app'], 
    'js_files' => ['app']])

@section('content')
<link href="{{ asset('css/biblioteca.css') }}" rel="stylesheet">
<link href="{{ asset('css/margin.css') }}" rel="stylesheet">
<div class="margen container">

        <div class="perfil">
            <div class="usuario">
            @if (is_null($usuario->avatar))
                <img class="avatar" src="http://127.0.0.1/public/images/default.svg">
            @else
                <img class="avatar" src="http://127.0.0.1/public/images/{{ $usuario->avatar }}">
            @endif
                <div class="datos">
                    <h1>{{$usuario->name}}</h1>                    
                    <br><a href="/profile_edit">Editar mi perfil</a>
                </div>
            </div>
            @if (Auth::user()->hasRole(['creator']) ||  Auth::user()->hasRole(['creator-mid']) ||  Auth::user()->hasRole(['creator-all']))      
                <div class="suscripcion">
                    <h2>Plan de suscripción: <span class="gratuito">{{$suscripcion[0]->description}}</span></h2>
                    <a href="/plans">Cambiar mi suscripción</a>
                </div> 
            @elseif (Auth::user()->hasRole(['user']) ||  Auth::user()->hasRole(['user-mid']) ||  Auth::user()->hasRole(['user-all']))        
                <div class="suscripcion">
                    <h2>Plan de suscripción: <span class="gratuito">{{$suscripcion[0]->description}}</span></h2>
                    <a href="/plans">Cambiar mi suscripción</a>
                </div>           
            @elseif (Auth::user()->hasRole(['administrator']))        
                <div class="suscripcion">
                    <h2>Administración de la página Play To Play</h2>
                    <a  href="/projects">Administrar Proyectos</a>
                    <a  href="/games">Administrar Juegos</a>                    
                </div>
            @endif
            
        </div>
        <h3>Tu Biblioteca</h3>
        
        <div class="galeria">

        @php
        function remote_file_exists($url){
                            $ch = curl_init($url);
                            curl_setopt($ch, CURLOPT_NOBODY, true);
                            curl_exec($ch);
                            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                            curl_close($ch);
                            if( $httpCode == 200 ){return true;}
                            return false;
                        }
        @endphp
        @foreach ($juegos as $juego)  
            <div class="interno">
                
                @if (remote_file_exists($juego->archives)) 
                    <a href="{{$juego->archives}}" class="btn-card"><img class="rounded mx-auto d-block imagen-juego" src="{{$juego->cover}}"  alt="Card image cap"><div class="nombre-juego"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="0 0 50 50" width="50pt" height="50pt"><defs><clipPath id="_clipPath_sZv9G6xcZeQw4DST1umJy0k0e2VATlNl"><rect width="50" height="50"/></clipPath></defs><g clip-path="url(#_clipPath_sZv9G6xcZeQw4DST1umJy0k0e2VATlNl)"><image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAyCAYAAAAus5mQAAADuUlEQVRoQ82ZTahVZRSGn1ekkIyQTAgEIwhyYKTcQSNBECfhyIFIXbMMqSAVbVDeK14HanKvP3UngYr96qSJQ5sUNO0PCkIQQfwZ+FOQZgrVkhe+Dftuz95nn+vZ+5wP7mzfbz/nXd9691rrU0QI+BLYANwD3gc+lhQMwVJE7AN2FVh+AN6Q9OugGQ14DXgy/T0BnARWAf8CU8CEJCs7kGVAh/KmpIUZQUS8BhwBFgAXgE2Svh8EYUdAg0TEIp9FYH0C+xTYIenPNkFLAXNqrgEM9zRwHdgu6VRbkF0Bk5qPAx8CbwPO+m+AzZIuNw1aCzCn5kvA58BzwN/AbuAjSf83BdoTYFLzUWAM+ACYC/wCbGzKknoGzKm5NKk5kizpcLKkf/qp5qwBk5pzgK3AfmAecBF4XdK3/YKsBIwIAyyzF0q6VfbSiFiSM3g/9gWwrR+WVOWDztbvgJWAwzYBHJL0XwXoRuBoMvgbyTcNO+tVBbgc+Kmw82/AqCQnRscVEU85s1Px4Wccbofd4e95VQHaoM922NEK+gszJqk0ISIib/B3chHoyZJmA5gxW5EtkmzaZWra4A8A7ySDt/JWszQCxY0eBjDb67QzWZLPXBlo3uAdAR+B8aoIZBv1A9B7/QG8J8mlWhlk0eBrWVK/ADMoJ8SbklyilYHmDd7PfJUKkI4R6DegX3gX2AtMlllS8td30/m0wd8Edkr6rIkzWCaWLckJ4fahTM2iwT8QgSYUzMPYUqaTJbn6KQMdTYnjCt7W5QhMOQJNA2ZArhtdP1ZZUtHgHYF1bQFmoG7ArE7pSgZ/AlgMXGkb0CF/RtKlLpA2+DPuLtsGNNfzks51AZyfvuEjbQNOS3L9WDfEV9sCrJMk7stdqr2S6FtJkro282qqkGwzM4y+SQXr1I7OVHeJHrV4tWLUvXzqPLh6LBUb/tR5QDBj9VvB2RQLnlK4f2m0WHC51VGBTI6IeCT10x71uZ/uWvD6f/uhYKUCfklEDKRg7apARAyk5K9Vshe+qY00TSuAHwtJVcc6Wms7PVVw27l6KBv3dLgN+QJwXtLtioKz/dFH1Qc9Zx2DHR51qTrcndliXkzjNw/d99Tpdev8+OyZnsdvEeH+djxd+AzXALNguMMzAk6GexB4a+iG6BHxMnAsXUP4VsrXEJ7HtLJ6ucjx3MUFweAvciJiE+Ch+FBchf0FuIt61oVH4TJx0l3+oC8Tv3YHXzhQnqf47uP3Vg5axUt8Bn0F675gLfAzcBz4ZFgutO8DtMe8UgKUFzYAAAAASUVORK5CYII=" x="4.809" y="0" width="40.381" height="50" style=""/></g></svg></div></a>
                @else
                    <a href="#" class="btn-card"><img class="rounded mx-auto d-block imagen-juego" src="{{$juego->cover}}"  alt="Card image cap"><div class="nombre-juego-error"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="0 0 50 50" width="50pt" height="50pt"><defs><clipPath id="_clipPath_sZv9G6xcZeQw4DST1umJy0k0e2VATlNl"><rect width="50" height="50"/></clipPath></defs><g clip-path="url(#_clipPath_sZv9G6xcZeQw4DST1umJy0k0e2VATlNl)"><image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAyCAYAAAAus5mQAAADuUlEQVRoQ82ZTahVZRSGn1ekkIyQTAgEIwhyYKTcQSNBECfhyIFIXbMMqSAVbVDeK14HanKvP3UngYr96qSJQ5sUNO0PCkIQQfwZ+FOQZgrVkhe+Dftuz95nn+vZ+5wP7mzfbz/nXd9691rrU0QI+BLYANwD3gc+lhQMwVJE7AN2FVh+AN6Q9OugGQ14DXgy/T0BnARWAf8CU8CEJCs7kGVAh/KmpIUZQUS8BhwBFgAXgE2Svh8EYUdAg0TEIp9FYH0C+xTYIenPNkFLAXNqrgEM9zRwHdgu6VRbkF0Bk5qPAx8CbwPO+m+AzZIuNw1aCzCn5kvA58BzwN/AbuAjSf83BdoTYFLzUWAM+ACYC/wCbGzKknoGzKm5NKk5kizpcLKkf/qp5qwBk5pzgK3AfmAecBF4XdK3/YKsBIwIAyyzF0q6VfbSiFiSM3g/9gWwrR+WVOWDztbvgJWAwzYBHJL0XwXoRuBoMvgbyTcNO+tVBbgc+Kmw82/AqCQnRscVEU85s1Px4Wccbofd4e95VQHaoM922NEK+gszJqk0ISIib/B3chHoyZJmA5gxW5EtkmzaZWra4A8A7ySDt/JWszQCxY0eBjDb67QzWZLPXBlo3uAdAR+B8aoIZBv1A9B7/QG8J8mlWhlk0eBrWVK/ADMoJ8SbklyilYHmDd7PfJUKkI4R6DegX3gX2AtMlllS8td30/m0wd8Edkr6rIkzWCaWLckJ4fahTM2iwT8QgSYUzMPYUqaTJbn6KQMdTYnjCt7W5QhMOQJNA2ZArhtdP1ZZUtHgHYF1bQFmoG7ArE7pSgZ/AlgMXGkb0CF/RtKlLpA2+DPuLtsGNNfzks51AZyfvuEjbQNOS3L9WDfEV9sCrJMk7stdqr2S6FtJkro282qqkGwzM4y+SQXr1I7OVHeJHrV4tWLUvXzqPLh6LBUb/tR5QDBj9VvB2RQLnlK4f2m0WHC51VGBTI6IeCT10x71uZ/uWvD6f/uhYKUCfklEDKRg7apARAyk5K9Vshe+qY00TSuAHwtJVcc6Wms7PVVw27l6KBv3dLgN+QJwXtLtioKz/dFH1Qc9Zx2DHR51qTrcndliXkzjNw/d99Tpdev8+OyZnsdvEeH+djxd+AzXALNguMMzAk6GexB4a+iG6BHxMnAsXUP4VsrXEJ7HtLJ6ucjx3MUFweAvciJiE+Ch+FBchf0FuIt61oVH4TJx0l3+oC8Tv3YHXzhQnqf47uP3Vg5axUt8Bn0F675gLfAzcBz4ZFgutO8DtMe8UgKUFzYAAAAASUVORK5CYII=" x="4.809" y="0" width="40.381" height="50" style=""/></g></svg></div></a> 
                @endif
                
            </div>
        @endforeach     
            <div class="interno">
            <a href="/games_all" class="btn-card"><div class="rounded mx-auto d-block imagen-juego vacio">+</div><div class="nombre-juego-vacio">Buscar Juegos</div></a> 
            </div>
        </div>

        @if (Auth::user()->hasRole(['creator']) ||  Auth::user()->hasRole(['creator-mid']) ||  Auth::user()->hasRole(['creator-all']))        
        <h3>Tus Proyectos</h3>
        <div class="galeria">
        @forelse ($proyectos as $proyecto)  
            <div class="interno">
            <a href="#" class="btn-card"><img class="rounded mx-auto d-block imagen-juego" src="{{$proyecto->cover}}"  alt="Card image cap"><div class="nombre-juego">{{$proyecto->name}}</div></a> 
            </div>
        @endforeach
        <div class="interno">
            <a href="/projects" class="btn-card"><div class="rounded mx-auto d-block imagen-juego vacio">+</div><div class="nombre-juego-vacio">Crea un Nuevo Proyecto</div></a> 
            </div>
        </div>
        @endif
</div>
@endsection

        