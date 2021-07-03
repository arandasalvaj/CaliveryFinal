@extends('layouts.plantilla')
@can('Store')
@section('contenido')
<div class="container-fluid px-4 ">
    <div class="row mb-4">
        <div class="row mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Registrar producto</button>
        </div>
        <!--------INICIO TABLA------>
        <table class="table table-bordered text-center ">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th width="280px">Actions</th>
            </tr>
            
                <tr>   
                    @foreach ($products as $product)
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>${{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>
                        
                    <form action="{{route('producto.destroy',$product->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>

                    </form>
                    <a class="btn btn-primary" href="{{ route('producto.edit',$product->id)}}">Editar</a>
                    </td>
                </tr>
                @endforeach

        </table>
        <!--------FIN TABLA------>
    </div>
</div>
@include('producto.create')
@endsection
@endcan
