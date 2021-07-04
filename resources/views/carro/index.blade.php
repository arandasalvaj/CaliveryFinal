@extends('layouts.layoutsV')
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
                       @foreach ($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$cantidadC}}</td>    
                            <td>0</td>
                        </tr>    
                        @endforeach                  
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@endcan