@extends('layouts.app')
@section('content')
    <body class="sb-nav-fixed">
        @include('layouts.vendedor.navbar')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">@yield('titulo')</h1>
                            @yield('contenido')
                        </div>
                            <body class="antialiased">
                                <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                                    @if (Route::has('login'))
                                        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                            @auth
                                                <a href="{{ route('home') }}" class="text-sm text-gray-700 underline">Inicio</a>
                                            @else
                                                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                                @if (Route::has('register'))
                                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                                @endif
                                            @endauth
                                        </div>
                                    @endif

                                        </div>
                                    </div>
                                </div>
                </main>
                        @include('layouts.partials.footer')
            </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{asset('libs/js/scripts.js')}}"></script>
 </body>
@endsection
                            

