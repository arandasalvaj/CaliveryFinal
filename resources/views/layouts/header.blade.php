{{-- Navbar. --}}
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #ff9b22;">
    <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}"><img src="img/calivery-icon3.png" class="img-fluid d-inline-block align-top" alt="Responsive image">
                {{-- {{ config('app.name', 'Calivery') }} --}}
            </a>
                    
        {{-- Menú hamburguesa. --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">   
                {{-- Barra de búsqueda. --}}    
                <li>
                    
                    <div class="input-group my-2 my-lg-0">
                        <input type="text" class="form-control" size="50" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="basic-addon2">
                        <span class="input-group-append">
                          <button class="btn btn-outline-secondary border-left-0 border" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" style="color: white;" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                          </svg>
                          </button>
                        </span>
                    </div>
                </li>       
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                {{-- @guest --}}
                <!-- Inicio - Tienda van en el home de la page -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/tienda') }}">{{ __('Mis Ordenes') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/tienda') }}">{{ __('Tiendas') }}</a>
                </li>
                <!-- Aca inicia la autentificación -->
                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Salir') }}</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('showcart')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                              </svg>
                            <span class="badge badge-danger ">{{contadorCart()}}</span></a>
                      </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                    @endif
                    @if (Route::has('registerD'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registerD') }}">{{ __('Vendedor') }}</a>
                        </li>
                    @endif
                    @if (Route::has('registerS'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registerS') }}">{{ __('Repartidor') }}</a>
                        </li>
                    @endif

                @endauth
                    {{-- @endif --}}

                    {{-- @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Regístrarse') }}</a>
                        </li>
                    @endif
                    @if (Route::has('registerD'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('registerD') }}">{{ __('Regístrar Repartidor') }}</a>
                    </li>
                    @endif
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Regístrar Vendedor') }}</a>
                    </li>
                    @endif --}}

                     {{-- @else --}}
                    {{-- <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li> --}}
                {{-- @endguest --}}
            </ul>
        </div>
    </div>
</nav>