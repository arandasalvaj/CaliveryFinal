@extends('layouts.layoutsC')
@can('Customer')
@section('contenido')
<div class="container-fluid ">
    <div class="container">

    
    <div class="row my-4 ">
        <div class="col-6 px-auto ">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body my-2 py-4">
                    <div class="d-flex justify-content-around">
                        <div>
                            <h3>Datos de Contacto</h3>
                           <h6>Nombre: {{Auth::user()->name}}</h6> 
                           
                           <h6>Telefono:+569{{Auth::user()->cellphone}}</h6> 
                        </div>
                    
                    </div>
                    
                    <div class="float-none">
                        
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-6 px-auto">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <div class="card-body px-5">
                    <div class="d-flex justify-content-around">
                        
                        <div class="col-12 py-1">
                            <h3>Datos de envio</h3>
                           <h6>Dirección:</h6> 
                           <h6>{{Auth::user()->address}}</h6> 
                           <div class="text-center">
                            <a href="#" class="btn btn-outline-primary btn-lg btn-block">Ver Seguimiento</a>   
                         </div>
            
                        </div>

                    </div>
                    
                    <div class="float-none">
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

    <div class="row my-5 mx-5 px-2">
    <div class="col-sm-12">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-body px-5">
                <div class="row px-3"><h3>Detalles del pedido</h3> </div>
                <br>
                <div class="row">
                    <div class="col-4 px-auto ">
                        <div class="div text-center">
                          <h6>Imagen</h6>  
                        </div>              
                    </div>
                    <div class="col-2 px-auto ">
                        <h6>Nombre</h6>
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
            
            <div class="card-body px-5">
               <div class="row px-3"> </div>
               <hr class="my-auto flex-grow-1">
               @foreach ($items as $item)
                <div class="card border-light">
                    <div class="card-body px-5">
                        <div class="row mt-1">
                            <div class="col-4">
                                <div class="col-3 mx-5"><!----TAMAÑO DE LA IMAGEN DEL CARD---->
                                    <img src="{{asset($item->img)}}" alt="" class=" img-fluid">
                                </div>
                            </div>
                            <div class="col-2 my-auto">
                                <h6>{{$item->name}}</h6>
                            </div>
                            <div class="col-2 my-auto">
                                <h5>${{$item->price}}</h5>
                            </div>
                            <div class="col-2 px-5 my-auto">
                                <h5>{{$item->quantity}}</h5>
                            </div>
                            <div class="col-2 px-5 my-auto">
                                <h5>${{$item->quantity*$item->price}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-auto flex-grow-1 ">
                @endforeach
                <div class="div text-center">

                
                <div class="container ">
                    <hr class="my-auto flex-grow-1 ">
                </div>
                <div class="row mt-2 ">
                    <div class="col-6">
                        <h5>Subtotal:</h5>
                    </div>
                    <div class="col-6">
                        <h5>${{$item->quantity*$item->price}}</h5>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-6">
                        <h5>Envío:</h5>
                    </div>
                    <div class="col-6">
                        <h5>${{precioEnvioOrden($item->quantity)}}</h5>
                    </div>
                </div>
                <hr class="my-auto flex-grow-1 pt-3">
                <div class="row">
                    <div class="col-6">
                        <h4>Total:</h4>
                    </div>
                    <div class="col-6">
                        <h5>${{precioEnvioOrden($item->quantity)+$item->quantity*$item->price}}</h5>
                    </div>
                </div>
            </div>
            </div>
          </div>
          <div class="div">
              <a href="{{ route('ordenesCliente') }}">
               <button type="button" class="btn btn-primary btn-lg btn-block">Volver Atras</button>
            </a>
          </div>
         
    </div>

@endsection    
@endcan
