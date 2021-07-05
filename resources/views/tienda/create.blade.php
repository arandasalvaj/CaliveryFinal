@extends('layouts.layoutsV')
@section('contenido')
@can('Seller')
    <div class="container px-auto ">
      
        <h1 class="mt-4">Crea tu tienda</h1>
          <form action="{{ route('tienda.store') }}" method="POST"> 
            @csrf  
             <div class="row">
              <div class="card-body shadow p-3 mb-5 bg-white rounded">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nombre</label>
                  <input type="text" class="form-control" name="name" placeholder="Ingrese Nombre">
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                  <label for="exampleFormControlInput1">Dirección</label>
                  <input type="text" class="form-control" name="address" placeholder="Ingrese Dirección">
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                  <label for="exampleFormControlInput1">Telefono</label>
                  <input type="text" class="form-control" name="cellphone" placeholder="Ingrese Telefono"">
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="form-group">
                  <label for="exampleFormControlInput1">Banner</label>
                  <input type="file" name="img" accept="image/*">
                </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block my-4">Crear</button> 
              </div>       
          </form>
    </div>
@endcan
@endsection