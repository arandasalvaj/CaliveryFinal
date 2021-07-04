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
                            <td>{{$Cart->quantity}}</td>    
                            <td>{{$Cart->subtotal}}</td>
                        
                        </tr>    
                        @endforeach                   
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@endcan