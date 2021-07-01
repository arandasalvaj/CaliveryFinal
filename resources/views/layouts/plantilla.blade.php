<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
  </head>
  <body>
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                <div class="d-flex">
                    <div class="mr-auto p-2">Hola,Bienvenido {{ Auth::user()->name }}</div>
                    <div class="p-2"><a class="p-2" href="{{ route('login') }}">Iniciar sesión</a></div>
                    <div class="p-2"><a class="p-2" href="{{ route('register') }}">Registrarse</a></div>
                </div>
            </div>
          </div>
      </div>
    <div class="pos-f-t">
        <nav class="navbar navbar-dark bg-warning">
            <a class="navbar-brand" href="#">
                <img src="{{asset('img/logoC2.png')}}" width="90" height="30" class="d-inline-block align-top" alt="">
                Bootstrap
            </a>
            <form class="form-inline">
                <div class="d-grid">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar producto" aria-label="Search">
                    <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
                </div>
            </form>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <li class="nav-item dropdown">
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
        </li>
        </nav>
        <div class="collapse" id="navbarToggleExternalContent">
          <div class="bg-warning py-2 text-center">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

                <li class="nav-item active">
                  <a class="nav-link" href="#"><b>Home</b><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><b>Home</b></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"><b>Home</b></a>
                </li>
              </ul>

          </div>
        </div>
    </div>
      <div class="container">
        @yield('seccion')  
        <a href="">Mostrar producto</a>
        <a href="">Agregar Producto</a>
        <a href="">Editar Producto</a>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>