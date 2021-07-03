@extends('layouts.plantilla')
@section('contenido')
@can('Store')
<div class="container-fluid px-4 ">
  <div class="row mb-4">
  <form action="" method="POST">
    @csrf
    @method('PUT')
    
    <div class="row py-2">
        <div class="col">
            <label for="">Nombre:</label>
          <input type="text" class="form-control" " name="name">
        </div>
    </div>
    <div class="row py-2">
          <div class="col">
              <label for="">Precio:</label>
              <input type="text" class="form-control" " name="price">
            </div>
    </div>
    <div class="row py-2">
          <div class="col">
              <label for="">Detalle:</label>
              <textarea class="form-control" rows="5" " name="detail"></textarea>
            </div>
    </div>
    <div class="row py-2">
          <div class="col">
              <label for="">Stock:</label>
              <input type="number" name="stock" min="1" max="100" " >
            </div>
    </div>
    <div class="row py-2">
          <div class="col">
              <label for="">Seleccione una imagen:</label>
              <input type="file" name="img" ">
            </div>
            <div class="col">
            </div>
    </div>
    <div class="row py-2">
          <div class="col">
              <label for="">Seleccione una Categoria:</label>
              <select class="form-control" name="category_id">
                  @foreach ($categories as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>   
                  @endforeach
                  </select> 
            </div>
    </div>
  </div>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      <button type="submit" class="btn btn-primary ">Guardar Cambios</button>
  </form>
</div>
@endcan
@endsection

