@extends('layouts.layoutsC')
@section('contenido')
<div class="container-fluid bg-danger">
    <div class="row">
        <div class="col-md-8 ">
            <img src="" alt="">  
            hola
         </div>
    </div>
</div>
<div class="container pt-4">
    <div class="row justify-content-center">
        <p> 
            <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Button with data-target</a>
            </div>
        </p>
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squi
            </div>
    </div>
</div>
<div class="container">
    <div class="card-deck">
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
                    <input type="number" name="quantity" min="1" max="{{($product->stock)}}" value="1">
                 </div>
                <button type="submit" class="btn btn-primary">Añadir al carro</button>
            </form>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection
