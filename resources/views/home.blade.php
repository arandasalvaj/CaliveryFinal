@extends('layouts.layous5')
@can('Customer')
@section('contenido')
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://www.esqgo.com/wp-content/uploads/2021/04/firm.jpg" class="tales d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://www.spinningfieldsonline.com//app/uploads/2016/07/1920x510-flannels-womenswear-1920x510.jpg" class="tales d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://d2pi5ijasmgfet.cloudfront.net/1920x510/filters:focal(2499x899:2501x901):quality(82):sharpen(0.5,0.5,true)/production%2Fpublic%2Fmisc%2FHero_Blog_5000x1800_190402_214700.png" class="tales d-block w-100" alt="...">
      </div>
    </div>
  </div>


  <div>
    <p class="t-titulos text-center">Categorías</p>
  </div>
  <div id="containerCategorias ml-3 mr-3" >
  <div class="container">
    <div id="carouselCategorias" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            {{-- Primera fila de items Categoría. --}}
            <div class="carousel-item active">
              <div class="row">
                <div class="col">
                    {{-- Placeholders en formato SVG con su respectivo tamaño en pixeles. --}}
                    <svg class="bd-placeholder-img rounded-circle img-fluid"viewBox="0 0 100 700" width="75" height="75" 
                    xmlns="http://www.w3.org/2000/svg" role="img"  
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#868e96"></rect>
                    <text class="" x="25%" y="50%" fill="#dee2e6" dy=".3em" font-size="20">75x75</text>
                </svg>
                </div>
              </div>
            </div>
            {{-- Segunda fila de items. --}}
            <div class="carousel-item">
                <div class="row">
                  <div class="col">
                      <svg class="bd-placeholder-img rounded-circle img-fluid" viewBox="0 0 100 700" width="75" height="75" 
                      xmlns="http://www.w3.org/2000/svg" role="img"  
                      preserveAspectRatio="xMidYMid slice" focusable="false">
                      <rect width="100%" height="100%" fill="#868e96"></rect>
                      <text x="25%" y="50%" fill="#dee2e6" dy=".3em" font-size="20">75x75</text>
                  </svg>
                  </div>
                </div>
              </div>
            {{-- Tercera fila de items. --}}
            <div class="carousel-item">
                <div class="row">
                  <div class="col">
                      <svg class="bd-placeholder-img rounded-circle img-fluid" viewBox="0 0 100 700" width="75" height="75" 
                      xmlns="http://www.w3.org/2000/svg" role="img"  
                      preserveAspectRatio="xMidYMid slice" focusable="false">
                      <rect width="100%" height="100%" fill="#868e96"></rect>
                      <text x="25%" y="50%" fill="#dee2e6" dy=".3em" font-size="20">75x75</text>
                  </svg>
                  </div>
                </div>
              </div>
        </div>
            {{-- Botones de control de Carousel Categorías. --}}
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselCategorias" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselCategorias" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden"></span>
        </button>
      </div>
  </div>
</div>



    {{-- Carousel Tiendas. --}}
    <div>
        <p  class="t-titulos text-center">Tiendas</p>
      </div>
      <div id="containerTiendas">
      <div class="container">
        <div id="carouselTiendas" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                {{-- Primera fila de items. --}}
                @foreach ($products as $product)

              <div class="carousel-item active">
                  <div class="row">
                    <div class="col">
                        <img src="{{asset($product->img)}}" class="card-img-top" alt="">
                    </div>
                  </div>
              </div>
              @endforeach
              {{-- Segunda fila. --}}
              <div class="carousel-item">
                <div class="row">
                  <div class="col">
                      <svg class="bd-placeholder-img rounded img-fluid" width="200" height="200" 
                          xmlns="http://www.w3.org/2000/svg" role="img" 
                          preserveAspectRatio="xMidYMid slice" focusable="false" viewBox="0 0 100 700">
                          <rect width="100%" height="100%" fill="#868e96"></rect>
                          <text x="32%" y="50%" fill="#dee2e6" dy=".3em" font-size="10">200x200</text>
                      </svg>
                  </div>
                </div>
            </div>
            {{-- Tercera fila. --}}
            <div class="carousel-item">
                <div class="row">
                  <div class="col">
                      <svg class="bd-placeholder-img rounded img-fluid" width="200" height="200" 
                          xmlns="http://www.w3.org/2000/svg" role="img" 
                          preserveAspectRatio="xMidYMid slice" focusable="false" viewBox="0 0 100 700">
                          <rect width="100%" height="100%" fill="#868e96"></rect>
                          <text x="32%" y="50%" fill="#dee2e6" dy=".3em" font-size="10">200x200</text>
                      </svg>
                  </div>
                </div>
            </div>
            </div>
            {{-- Botones control del carousel Tiendas. --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselTiendas" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselTiendas" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden"></span>
            </button>
          </div>
      </div>
    </div>






<div class="container">
    <div class="card-deck my-5">
    @foreach ($products as $product)
        <div class="card " style="width: 18rem;">
            <img src="{{asset($product->img)}}" class="card-img-top" alt="">
            <div class="card-body">
            <h5 class="card-title">{{($product->name)}}</h5>
            <p class="card-text">{{($product->detail)}}</p>
            <h5 class="card-title">{{($product->price)}}</h5>
            <form action="{{ route('cart.store')}}" method="post">
                @csrf 
                <input type="hidden" name="product_id" value="{{$product->id}}">
                <div class="options d-flex flex-fill py-2">
                    <input placeholder="Enter a number" required type="number" name="quantity" min="1" max="{{($product->stock)}}" value="1">
                 </div>
                <button type="submit" class="btn btn-primary">Añadir al carro</button>
            </form>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
@endcan
