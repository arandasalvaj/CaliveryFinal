@extends('layouts.layoutsC')
@can('Customer')
@section('contenido')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 bg-light">
                <table class="table table-striped">
                    <thead>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    </thead>
                    <tbody>
                       @foreach ($Carts as $Cart)
                        <tr>
                            <td>{{$Cart->productos->name}}</td>
                            <td>{{$Cart->productos->price}}</td>
                            <form action="{{route('cart.update',$Cart)}}" method="POST">
                                @csrf
                                @method('PUT')
                            <td><input placeholder="Enter a number" required type="number" name="quantity" min="1" max="{{$Cart->productos->stock}}" value="{{$Cart->quantity}}">   
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/></svg>
                                </button></td>
                        </form> 
                            <td>{{$Cart->subtotal}}</td>
                        
                        </tr>    
                        @endforeach                   
                    </tbody>
                </table>
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('orden.store')}}" method="POST">
                            @csrf
                            <input type="hidden" name="total" value="{{$total}}">
                                <h1>Total:{{$total}}</h1>
                            <button type="submit" class="btn btn-primary">Checkout</button>
                        </form>
                    </div>
                  </div>
                
            </div>
        </div>
    </div>
@endsection
@endcan