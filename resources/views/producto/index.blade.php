@extends('layouts.layoutsV')
@can('Store')
@section('contenido')
<div class="container-fluid px-4 ">
    <div class="row mb-4 shadow-lg p-3 mb-5 bg-white rounded">

        <button type="button" class="btn btn-primary btn-lg btn-block my-4" data-toggle="modal" data-target="#exampleModal">Registrar producto</button>
        
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
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Editar
                          </button>
                    </form>
                    </td>
                </tr>
                @endforeach
        </table>
        <!--------FIN TABLA------>
    </div>
</div>


<!-- Button trigger modal -->

  @if (productos()==null)
      

  @else
  
  @endif
  <!-- Modal -->

@endsection
    @section('modal')
        @include('producto.create')
    @endsection
@endcan
