@extends('layouts.layoutsV')
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
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th width="280px">Actions</th>
            </tr>
                <tr>   
                    @foreach ($products as $product)
                    <td>{{$product->id}}</td>
                    <td>
                    <div class="card mx-auto" style="width: 18rem;">
                        <img src="{{asset($product->img)}}" class="card-img-top" alt="">
                        </div>
                    </td>
                    <td>{{$product->name}}</td>
                    <td>${{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>
                        
                    <form action="{{route('producto.destroy',$product->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>

                    </form>
                    <form action="{{ route('producto.edit',$product->id)}}" method="GET">
                        @csrf
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModalLabel">Editar</button>

                    </form>
                    </td>
                </tr>
                @endforeach
        </table>
        <!--------FIN TABLA------>
    </div>
</div>
@endsection
    @section('modal')
        @include('producto.create')
    @endsection
@endcan
