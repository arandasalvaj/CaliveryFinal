<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

    <div class="d-flex" id="wrapper">
      <!-- Sidebar-->
      <div class="border-end bg-warning text-white" id="sidebar-wrapper">
          <div class="sidebar-heading border-bottom bg-warning text-white text-center">
            <!-- Logo-->
            <a class="list-group-item list-group-item-action list-group-item-warning p-3 text-center" href="#!">Dashboard</a>
            <!-- Logo-->
            </div>
          <div class="list-group list-group-flush bg-warning">
              <a class="list-group-item list-group-item-action list-group-item-warning p-3 text-center" href="{{route('producto.index')}}">Productos</a>
              <a class="list-group-item list-group-item-action list-group-item-warning p-3 text-center" href="#!">Shortcuts</a>
              <a class="list-group-item list-group-item-action list-group-item-warning p-3 text-center" href="#!">Overview</a>
              <a class="list-group-item list-group-item-action list-group-item-warning p-3 text-center" href="#!">Events</a>
              <a class="list-group-item list-group-item-action list-group-item-warning p-3 text-center" href="#!">Profile</a>
              <a class="list-group-item list-group-item-action list-group-item-warning p-3 text-center" href="#!">Status</a>
          </div>
      </div>
      <!-- Page content wrapper-->
      <div id="page-content-wrapper">
          <!-- Top navigation-->
          <nav class="navbar navbar-expand-lg navbar-light bg-warning border-bottom">
              <div class="container-fluid">
                  <button class="btn btn-primary" id="sidebarToggle">Abrir Menu</button>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                        
                        <li class="nav-item">
                          <a class="nav-link" href="{{route('producto.index')}}"><b>Productos</b></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><b>Home</b></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#"><b>Home</b></a>
                        </li>
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
                      </ul>
                  </div>
              </div>
          </nav>
          <!-- Page content-->
          <div class="container py-4">
            @yield('seccion')  
          </div>
      </div>
  </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>