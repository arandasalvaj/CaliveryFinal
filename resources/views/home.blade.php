@extends('layouts.layoutsC')
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

<div class="container mb-5 mt-5">
<div class="row">
  @foreach (productos() as $product)
  <div class="col-md-4">
    <div class="card mt-3">
      <div class="product-1 align-items-center p-2 text-center">
        <div class="card border-light">
          <div class="card-body px-5">
              <div class="row mt-1">
                  <div class="col-4">
                      <div class="col-3 mx-5"><!----TAMAÑO DE LA IMAGEN DEL CARD---->
                        <img src="{{asset($product->img)}}" alt="" class="rounded img-fluid">
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <img src="{{asset($product->img)}}" alt="" class="rounded" width="160">

        <h5>{{$product->name}}</h5>
        <div class="mt-3 info">
          <span class="text1 d-block">{{$product->detail}}</span>
        </div>
        <div class="cost mt-4 text-dark">
          <span>${{$product->price}}</span>
          <div class="mt-3 align-items-center">
            <form action="{{ route('cart.store')}}" method="post">
              @csrf 
              <input type="hidden" name="product_id" value="{{$product->id}}">
              <div class="options d-flex flex-fill py-2 mx-5 px-5 text-center">
                <div class=" col px-auto">
                  <input placeholder="Enter a number" required type="number" name="quantity" min="1" max="{{($product->stock)}}" value="1">
                </div>
               </div>
              <button type="submit" class="btn btn-primary">Añadir al carro</button>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>

@endsection
