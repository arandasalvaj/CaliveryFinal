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


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Authentication Links -->
                {{-- @guest --}}
                <!-- Inicio - Tienda van en el home de la page -->
             
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ordenesCliente') }}">{{ __('Tiendas') }}</a>
                </li>

                <!-- Aca inicia la autentificación -->
                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ordenesCliente') }}">{{ __('Mis Ordenes') }}</a>
                    </li>
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
            </ul>
        </div>
    </div>
</nav>