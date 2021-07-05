@extends('layouts.layoutsC')
@can('Customer')
@section('contenido')
<div class="container-fluid">
    <div class="row my-5 mx-5 px-2">
        <div class="col-sm-7">
            <div class="col pb-5">
                <div class="card ">
                    <div class="card-body px-5">
                        <h3>Informació de contacto:ID de la Orden:{{$idOrden}}</h3>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nombre de Contacto</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" value="{{$user->name}} {{$user->lastname}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Telefono de Contacto</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" 
                            @if($user->cellphone=='')
                            placeholder="Ingrese Telefono de contacto"
                            @endif value="{{$user->cellphone}}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card ">
                    <div class="card-body px-5">
                        <h3>Ingrese Dirección</h3>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Calle</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" value="" placeholder="Ingrese Calle">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">N* de Casa</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" 
                            @if($user->cellphone=='')
                            placeholder="Ingrese Numero de casa"
                            @endif value="{{$user->cellphone}}">
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{route('item.store')}}" method="POST">
                @csrf
                <div class="col">
                    <div class="col-12 px-4 mt-3">
                        <button class="btn btn-primary">Continuar con la compra</button>   
                    </div>
                </div>
                <input type="hidden" name="idOrden" value="{{$idOrden}}">
            </form>

        </div>



        
    <div class="col-sm-5">
        <div class="card ">
            <div class="card-body px-5">
               <div class="row px-3"> <h3>Detalles del pedido</h3></div>
               <hr class="my-auto flex-grow-1">
                @foreach ($Carts as $Cart)
                <div class="card border-light">
                    <div class="card-body px-5">
                        <div class="row mt-3">
                            <div class="col-3">
                                <img src="{{asset($Cart->productos->img)}}" alt="" class=" img-fluid">
                            </div>
                            <div class="col-6">
                                <div class="col ">
                                    <h5>{{$Cart->productos->name}}</h5>
                                    Cant: {{$Cart->quantity}}
                                    <h5>${{$Cart->productos->price}}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-auto flex-grow-1 ">
                @endforeach
                <div class="container">
                    <hr class="my-auto flex-grow-1 ">
                </div>
                <div class="row mt-3">
                    <div class="col-8">
                        <h5>Subtotal</h5>
                    </div>
                    <div class="col-4">
                        <h5>${{$total}}</h5>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-8">
                        <h5>Envío</h5>
                    </div>
                    <div class="col-4">
                        <h5>$1500</h5>
                    </div>
                </div>
                <hr class="my-auto flex-grow-1 pt-3">
                <div class="row">
                    <div class="col-8">
                        <h4>Total</h4>
                    </div>
                    <div class="col-4">
                        <h5>${{$total}}</h5>
                    </div>
                </div>
            </div>
          </div>
    </div>
    </div>

    
</div>



@endsection    
@endcan

