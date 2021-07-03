@extends('layouts.plantilla')
@section('contenido')
@can('Seller')
<h1>Bienvenido, eres Vendedor y puedes crear tu tienda naaaaaaa</h1>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Crea tu tienda</h1>
          <form action="{{ route('tienda.store') }}" method="POST"> 
            @csrf  
             <div class="row">
              <div class="card-body">
                <div class="col-md-4 mb-3">
                  <label for="validationDefault01">Nombre:</label>
                  <input type="text" class="form-control" id="validationDefault01" name="name" placeholder="Nombre" required>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="validationDefault01">Dirección:</label>
                  <input type="text" class="form-control" id="validationDefault02" name="address" placeholder="Dirección" required>
                </div> 
                <div class="col-md-4 mb-3">
                  <label for="validationDefault01">Telefono:</label>
                  <input type="text" class="form-control" id="validationDefault04" name="cellphone" placeholder="Telefono" required>
                </div> 
                <div class="col-md-4 mb-3">
                  <label for="validationDefault01">Correo de contacto:</label>
                  <input type="email" class="form-control" id="validationDefault05" name="email" value="{{ Auth::user()->email }}" placeholder="Correo" required>
                </div>  
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="logo" id="customFile">
                  <label class="custom-file-label" for="customFile">sube tu banner</label>
                </div>
                <button type="submit" class="btn btn-primary">Crear</button> 
              </div>       
          </form>
    </div>
@endcan
@endsection