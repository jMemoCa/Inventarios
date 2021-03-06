<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href=//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
 
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-light text-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Inventario
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav justify-content-center  text-light">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else
                            
                        @if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'articulos>consultar')) 

                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link" href="/articulos" role="button">
                                           Artículos 
                                        </a>
                        @endif
                        @if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'categorias>consultar')) 

                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link" href="/categorias" role="button">
                                           Categorías 
                                        </a>
                        @endif
                        @if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'bitacoras>consultar')) 

                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link" href="/bitacoras" role="button">
                                           Bitácora de movimientos
                                        </a>
                        @endif

                        @if(Auth::user()->hasAccessUsuarioAccion(Auth::user()->id ,'permisos>consultar')) 

                            <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link" href="/permisos" role="button">
                                           Permisos
                                        </a>
                        @endif

                            


                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <span>{{Session::get('notificacion')}}<span>
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
