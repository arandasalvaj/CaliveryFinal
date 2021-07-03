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