@extends('layouts.layoutsC')
@can('Customer')
@section('contenido')
<div class="container">
    <div class="row my-4">
        <div class="col-12">
            <div class="card ">
                <div class="card-body px-5">
                    <div class="d-flex justify-content-around">
                        <div>
                            <h3>Datos de envio</h3>
                           <h6>Los productos seran enviados a:</h6> 
                           <h6>Palqui 4401</h6> 
                        </div>

                        <div>
                            <h3>Datos de Contacto</h3>
                           <h6>Persona que recibira el producto es:</h6> 
                           <h6>jean arnad asalvca</h6> 
                           <h6>Telefono de contacto:+56957252745</h6> 
                        </div>
                    
                    </div>
                    
                    <div class="float-none">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 my-4">
            <div class="card ">
                <div class="card-body px-5">
                    <h3>Resumen</h3>
                    <br>
                    <div class="row">
                    <div class="col-6 ">
                        <h6>Imagen</h6>

                    </div>
                    <div class="col-2 ">
                        <h6>Precio</h6>

                    </div>
                    <div class="col-2 ">
                        <h6>Cant</h6>

                    </div>
                    <div class="col-2 ">
                        <h6>Total</h6>

                    </div> 
                    </div>
                </div>
                @foreach ($carts as $cart)
                <div class="card-body px-5">
                    <br>
                    <div class="row">
                    <div class="col-6 ">
                        <img src="{{asset($cart->productos->img)}}" alt="" class=" img-fluid">

                    </div>
                    <div class="col-2 ">
                        <h6>{{$cart->productos->price}}</h6>

                    </div>
                    <div class="col-2 ">
                        <h6>{{$cart->quantity}}</h6>

                    </div>
                    <div class="col-2 ">
                        <h6><h6>{{$total}}</h6></h6>

                    </div> 
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 my-4">
            <div class="card ">
                <div class="card-body px-5">
                    <div class="float-right">
                        
                        <h6>SubTotal:$321312</h6> 
                        <h6>Envio:$321312</h6> 
                        <h3>Total:$1500</h3>
                    <button type="submit" class="btn btn-primary"> Pagar</button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    
@endcan