@extends('layouts.layoutsC')
@can('Customer')
@section('contenido')

@if(contadorCart()==0)
<h1 class="display-1 text-center">Carro Vacio!</h1>
@else
<div class="container">
    <div class="row">
    <h1>Cantitad total de items: {{contadorCart()}}</h1>
    <div class="col-sm-12 bg-light">
        <table class="table table-striped">
            <thead>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            </thead>
            <tbody>
                @foreach (carrito() as $Cart)
                <tr>
                    <td>{{$Cart->productos->name}}</td>
                    <td>${{$Cart->productos->price}}</td>
    
                    <form action="{{route('cart.update',$Cart)}}" method="POST">
                        @csrf
                        @method('PUT')
                    <td>
                        <input type="number" name="quantity" min="1" max="{{$Cart->productos->stock}}" value="{{$Cart->quantity}}">
                        <button type="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                            <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                            </svg>
                        </button>
                       </form>      
                    </td>
                    <td>
                        <h6>${{$Cart->subtotal}}</h6>
                        
                        <form action="{{route('cart.destroy',$Cart->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="col">
                                <button type="submit" class="btn btn-danger ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                </button>
                            </div>
                        </form>
                </td>
                
                </tr>    

                
                @endforeach                   
            </tbody>
        </table>
        <div class="card">
            <div class="card-body ">
                <form action="{{route('orden.store')}}" method="POST">
                    @csrf
                    <div class="row mt-2 ">
                        <div class="col-8">
                            <h5>Subtotal:</h5>
                        </div>
                        <div class="col-4">
                            <h5>${{subTotal()}}</h5>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-8">
                            <h5>Envío:</h5>
                        </div>
                        <div class="col-4">
                            <h5>${{precioEnvio()}}</h5>
                        </div>
                    </div>
                    <hr class="my-auto flex-grow-1 pt-3">
                    <div class="row">
                        <div class="col-8">
                            <h4>Total:</h4>
                        </div>
                        <div class="col-4">
                            <h5>${{precioTotal()}}</h5>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Checkout</button>
                </form>
            </div>
            </div>
    </div>
</div>
</div>
@endif
@endsection
@endcan