<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Almacen</title>

    <script src="js/jquery-3.2.1.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse bg-inverse">
            <div class="container">
                <div class="navbar-header">
                      <!-- Inicio a pagina principal-->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <i aria-hidden="true" class="fa fa-home fa-2x ">
                            </i>
                        </a>
                
                    @if(Auth::check() && Auth::user()->rol == "Administrador")
                  
                    <a class="navbar-brand opt-nav" href="{{ url('gestion_usuarios') }}"> Gestion Usuarios</a>
                    <a class="navbar-brand opt-nav" href="{{ url('gestion_programas') }}"> Gestion Programas</a>
                    <a class="navbar-brand opt-nav" href="{{ url('gestion_horario') }}"> Gestion Horario</a>
                    <a class="navbar-brand opt-nav" href="{{ url('gestion_ambiente') }}"> Gestion Ambiente Formacion</a>
                    <a class="navbar-brand opt-nav" href="{{ url('gestion_instructor') }}"> Gestion Instructor</a>
                  
                    @endif
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name}} {{ Auth::user()->apellido}} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
