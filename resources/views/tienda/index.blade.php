@extends('layouts.plantilla')
@section('seccion')
@can('Seller')
<div class="container-fluid px-4">
    <h1 class="mt-4">Crea tu TIENDA</h1>
         <div class="row">
          <div class="card-body">
            <div class="col-md-4 mb-3">
            @foreach ($store as $item)
              <label for="validationDefault01">Nombre:</label>
              <h1>{{$item->name }}</h1>
            </div>
            <div class="col-md-4 mb-3">
              <label for="validationDefault01">Dirección:</label>
              <h1>{{$item->address }}</h1>
            </div> 
            <div class="col-md-4 mb-3">
              <label for="validationDefault01">Telefono:</label>
              <h1>{{$item->cellphone }}</h1>
            </div> 
            <div class="col-md-4 mb-3">
              <label for="validationDefault01">Correo de contacto:</label>
              <h1>{{$item->email }}</h1>
            </div>  
            <div class="custom-file">
              <label class="custom-file-label" for="customFile">Banner</label>
            </div>
            @endforeach
          </div>       
</div>
@endcan
@endsection