<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Play To Play</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/general.css') }}" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
        @toastr_css
    </head>    
    <body>
            <nav class="fixed-top position-fixed navbar navbar-expand-lg navbar-light navegador">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/"><div class="logo"></div><!--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="isolation:isolate" viewBox="0 0 285.576 72" width="285.576px" height="72px"><defs><clipPath id="_clipPath_c9qYp5da29XYHoCCigxZXEo43aSrh8ja"><rect width="285.576" height="72"/></clipPath></defs><g clip-path="url(#_clipPath_c9qYp5da29XYHoCCigxZXEo43aSrh8ja)"><defs><filter id="K9PCagGIgOwwP6pF4jSjA5JAif5OjIPx" x="-200%" y="-200%" width="400%" height="400%" filterUnits="objectBoundingBox" color-interpolation-filters="sRGB"><feGaussianBlur xmlns="http://www.w3.org/2000/svg" in="SourceGraphic" stdDeviation="2.146804531419514"/><feOffset xmlns="http://www.w3.org/2000/svg" dx="0" dy="0" result="pf_100_offsetBlur"/><feFlood xmlns="http://www.w3.org/2000/svg" flood-color="#98CCFD" flood-opacity="1"/><feComposite xmlns="http://www.w3.org/2000/svg" in2="pf_100_offsetBlur" operator="in" result="pf_100_dropShadow"/><feBlend xmlns="http://www.w3.org/2000/svg" in="SourceGraphic" in2="pf_100_dropShadow" mode="normal"/></filter></defs><g filter="url(#K9PCagGIgOwwP6pF4jSjA5JAif5OjIPx)"><path d="M 33.581 7 L 254.139 7 C 264.394 7 272.72 15.326 272.72 25.582 L 272.72 46.418 C 272.72 56.674 264.394 65 254.139 65 L 33.581 65 C 23.326 65 15 56.674 15 46.418 L 15 25.582 C 15 15.326 23.326 7 33.581 7 Z" style="stroke:none;fill:#DEDEDE;stroke-miterlimit:10;"/><path d="M 33.581 7 L 254.139 7 C 264.394 7 272.72 15.326 272.72 25.582 L 272.72 46.418 C 272.72 56.674 264.394 65 254.139 65 L 33.581 65 C 23.326 65 15 56.674 15 46.418 L 15 25.582 C 15 15.326 23.326 7 33.581 7 Z" style="fill:none;stroke:#000000;stroke-width:2;stroke-linecap:square;stroke-linejoin:round;stroke-miterlimit:2;"/></g><defs><filter id="wbrJndlI4Wt4tTVR4Cuq2M0pVhW2zSqA" x="-200%" y="-200%" width="400%" height="400%" filterUnits="objectBoundingBox" color-interpolation-filters="sRGB"><feGaussianBlur xmlns="http://www.w3.org/2000/svg" in="SourceGraphic" stdDeviation="2.146804531419514"/><feOffset xmlns="http://www.w3.org/2000/svg" dx="0" dy="0" result="pf_100_offsetBlur"/><feFlood xmlns="http://www.w3.org/2000/svg" flood-color="#98CCFD" flood-opacity="1"/><feComposite xmlns="http://www.w3.org/2000/svg" in2="pf_100_offsetBlur" operator="in" result="pf_100_dropShadow"/><feBlend xmlns="http://www.w3.org/2000/svg" in="SourceGraphic" in2="pf_100_dropShadow" mode="normal"/></filter></defs><g filter="url(#wbrJndlI4Wt4tTVR4Cuq2M0pVhW2zSqA)"><path d="M 23.426 7 L 59.574 7 C 64.224 7 68 10.776 68 15.426 L 68 56.574 C 68 61.224 64.224 65 59.574 65 L 23.426 65 C 18.776 65 15 61.224 15 56.574 L 15 15.426 C 15 10.776 18.776 7 23.426 7 Z" style="stroke:none;fill:#FFFFFF;stroke-miterlimit:10;"/><path d="M 23.426 7 L 59.574 7 C 64.224 7 68 10.776 68 15.426 L 68 56.574 C 68 61.224 64.224 65 59.574 65 L 23.426 65 C 18.776 65 15 61.224 15 56.574 L 15 15.426 C 15 10.776 18.776 7 23.426 7 Z" style="fill:none;stroke:#000000;stroke-width:2;stroke-linecap:square;stroke-linejoin:round;stroke-miterlimit:2;"/></g><defs><filter id="v3AWRebL5Ab391sNS1quDn9j0vXwuyoE" x="-200%" y="-200%" width="400%" height="400%" filterUnits="objectBoundingBox" color-interpolation-filters="sRGB"><feGaussianBlur xmlns="http://www.w3.org/2000/svg" in="SourceGraphic" stdDeviation="0.8587218125678057"/><feOffset xmlns="http://www.w3.org/2000/svg" dx="0" dy="0" result="pf_100_offsetBlur"/><feFlood xmlns="http://www.w3.org/2000/svg" flood-color="#000000" flood-opacity="0.5"/><feComposite xmlns="http://www.w3.org/2000/svg" in2="pf_100_offsetBlur" operator="in" result="pf_100_dropShadow"/><feBlend xmlns="http://www.w3.org/2000/svg" in="SourceGraphic" in2="pf_100_dropShadow" mode="normal"/></filter></defs><g filter="url(#v3AWRebL5Ab391sNS1quDn9j0vXwuyoE)"><g clip-path="url(#_clipPath_FlwXByi0kkp8uhnt0T0uj0WtGDBeqjmL)"><text transform="matrix(1,0,0,1,48.446,28.96)" style="font-family:'Oxanium';font-weight:700;font-size:24px;font-style:normal;fill:#000000;stroke:none;">2</text></g><defs><clipPath id="_clipPath_FlwXByi0kkp8uhnt0T0uj0WtGDBeqjmL"><rect x="0" y="0" width="19.643" height="25" transform="matrix(1,0,0,1,48.446,10)"/></clipPath></defs></g><g><path d=" M 24.463 60.45 C 23.622 59.975 23.104 59.082 23.111 58.116 L 23.051 23.94 C 23.045 22.962 23.565 22.057 24.413 21.57 C 25.238 21.08 26.264 21.072 27.096 21.55 L 56.598 38.37 C 57.433 38.843 57.95 39.73 57.948 40.69 C 57.956 41.674 57.452 42.568 56.601 43.069 L 27.16 60.424 C 26.332 60.922 25.3 60.932 24.463 60.45 Z " fill="rgb(152,204,253)"/><path d=" M 56.334 38.832 C 57.005 39.215 57.412 39.911 57.416 40.693 C 57.425 41.491 57.017 42.206 56.331 42.613 L 26.889 59.969 C 26.225 60.367 25.397 60.375 24.726 59.988 C 24.048 59.601 23.644 58.902 23.641 58.117 L 23.581 23.941 C 23.575 23.151 23.996 22.42 24.681 22.029 C 25.343 21.635 26.165 21.628 26.833 22.012 L 56.334 38.832 Z  M 56.861 37.908 L 27.36 21.088 C 25.205 19.859 22.514 21.443 22.519 23.942 L 22.579 58.118 C 22.573 59.274 23.193 60.343 24.199 60.912 C 25.202 61.488 26.437 61.478 27.429 60.884 L 56.87 43.528 C 59.024 42.259 59.016 39.137 56.861 37.908 Z " fill="rgb(71,136,199)"/><defs><filter id="g0Vg7CkMmlfUUrmKRknZFWupQtvMfsMV" x="-200%" y="-200%" width="400%" height="400%" filterUnits="objectBoundingBox" color-interpolation-filters="sRGB"><feGaussianBlur xmlns="http://www.w3.org/2000/svg" in="SourceGraphic" stdDeviation="2.146804531419514"/><feOffset xmlns="http://www.w3.org/2000/svg" dx="0" dy="0" result="pf_100_offsetBlur"/><feFlood xmlns="http://www.w3.org/2000/svg" flood-color="#7DA7CF" flood-opacity="1"/><feComposite xmlns="http://www.w3.org/2000/svg" in2="pf_100_offsetBlur" operator="in" result="pf_100_dropShadow"/><feBlend xmlns="http://www.w3.org/2000/svg" in="SourceGraphic" in2="pf_100_dropShadow" mode="normal"/></filter></defs><g filter="url(#g0Vg7CkMmlfUUrmKRknZFWupQtvMfsMV)"><path d=" M 26.833 56.292 L 26.805 25.669 L 53.202 40.719 L 26.833 56.292 Z " fill="rgb(255,255,255)"/></g></g><g clip-path="url(#_clipPath_Ind90pIG1fGnmOoEkVrvexpm09aceOcl)"><text transform="matrix(1,0,0,1,76.724,48.202)" style="font-family:'Palanquin Dark';font-weight:400;font-size:26px;font-style:normal;fill:#000000;stroke:none;">PLAY  TO  PLAY</text></g><defs><clipPath id="_clipPath_Ind90pIG1fGnmOoEkVrvexpm09aceOcl"><rect x="0" y="0" width="216.852px" height="34.236px" transform="matrix(1,0,0,1,76.724,13.882)"/></clipPath></defs></g></svg>--></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 listaNav listaJP">

                        <li class="nav-item dropdown" id="menuJuegos">
                            <a id="navbarDropdownJ" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true" v-pre>
                                JUEGOS
                            </a>             
                            <div class="dropdown-menu dropdown-menu-end contenedor" aria-labelledby="navbarDropdown">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a class="dropdown-item" href="/games_all">Todos los juegos</a></li>
                                    @foreach($generos_juegos as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a class="dropdown-item" href="/genre_games/{{$item->name_of_genre}}"><span>{{$item->name_of_genre}}</span></a>
                                        <div class="circulo">{{$item->number_of_games}}</div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div> 
                        </li>
                        <li class="nav-item dropdown" id="menuProyectos">
                            <a id="navbarDropdownP" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                PROYECTOS
                            </a>    
                            <div class="dropdown-menu dropdown-menu-end contenedor" aria-labelledby="navbarDropdown">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a class="dropdown-item" href="/projects_all">Todos los proyectos</a></li>
                                    @foreach($generos_proyectos as $item)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a class="dropdown-item" href="/genre_projects/{{$item->name_of_genre}}"><span>{{$item->name_of_genre}}</span></a>
                                        <div class="circulo">{{$item->number_of_games}}</div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div> 
                        </li>
                        <li class="nav-item" id="menuJuegos">
                            <a id="navbarDropdownJ" class="nav-link" href="/contact" role="button" aria-haspopup="true" aria-expanded="false">
                                CONTACTO
                            </a>                                 
                        </li>
                        <li class="nav-item" id="menuProyectos">
                            <a id="navbarDropdownP" class="nav-link" href="/help" role="button" aria-haspopup="true" aria-expanded="false">
                                AYUDA
                            </a>                           
                        </li>                
                    </ul>         
                    
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <div class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('INICIAR SESIÓN') }}</a>
                                    </div>
                                @endif                    
                                @if (Route::has('register'))
                                    <div class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('REGISTRO') }}</a>
                                    </div>
                                @endif
                            @else
                                <div class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>    

                                    <div id="menu_usuario" class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="/user">Mi Biblioteca                                      
                                        </a>
                                        @if (Auth::user()->hasRole(['user']) ||  Auth::user()->hasRole(['user-mid']) ||  Auth::user()->hasRole(['user-all']))        
                                            <a class="dropdown-item" href="/profile_edit">Editar mi Perfil</a>           
                                            <a class="dropdown-item" href="/plans">Cambiar Suscripción</a>
                                        @endif
                                        @if (Auth::user()->hasRole(['creator']) ||  Auth::user()->hasRole(['creator-mid']) ||  Auth::user()->hasRole(['creator-all']))      
                                            <a class="dropdown-item" href="/profile_edit">Editar mi Perfil</a>                
                                            <a class="dropdown-item" href="/projects">Gestionar Proyectos</a>
                                            <a class="dropdown-item" href="/plans">Cambiar Suscripción</a>
                                        @endif
                                        @if (Auth::user()->hasRole(['administrator']))   
                                            <a class="dropdown-item" href="/profile_edit">Editar mi Perfil</a>                           
                                            <a class="dropdown-item" href="/games">Administrar Juegos</a>
                                            <a class="dropdown-item" href="/projects">Administrar Proyectos</a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                            </div>
                            @endguest
                
                    </div>
                </div>
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
            <footer class="footer">
                <p>© 2022 Andrés Gallardo Simón - PLAY TO PLAY - Todos los derechos reservados</p>
            </footer>
            <script src="{{asset('js/app.js')}}"></script>
    </body>
    @jquery
    @toastr_js
    @toastr_render
</html>
