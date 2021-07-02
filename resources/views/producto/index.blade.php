@extends('layouts.plantilla')
@section('seccion')
@can('Store')
<div class="container-fluid px-4 ">
    <div class="row border border-secondary mb-4">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Registrar producto</button>

        <!--------INICIO TABLA------>
        <!--------FIN TABLA------>
        <!--------MODAL INGRESAR PRODUCTO------>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                    <div class="modal-header bg-warning ">
                    <h5 class="modal-title " id="exampleModalLabel">Registrar Producto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @foreach ($store as $item)
                    <form action="{{route('producto.store',$item->id)}}" method="POST">
                        @endforeach
                        @csrf
                        @method('PUT')
                        <div class="row py-2">
                          <div class="col">
                              <label for="">Nombre</label>
                            <input type="text" class="form-control"  name="name">
                          </div>
                        </div>
                        <div class="row py-2">
                            <div class="col">
                                <label for="">Detalle</label>
                              <input type="text" class="form-control"name="address">
                            </div>
                          </div>
                        <div class="row py-2">
                            <div class="col">
                                <label for="">Precio</label>
                                <input type="text" class="form-control" name="price">
                              </div>
                        </div>
                        <div class="row py-2">
                            <div class="col">
                                <label for="">Detalle:</label>
                                <textarea class="form-control" rows="5" name="detail"></textarea>
                              </div>
                        </div>
                        <div class="row py-2">
                            <div class="col">
                                <label for="">Stock</label>
                                <input type="number" name="stock" min="1" max="100">
                              </div>
                        </div>
                        <div class="row py-2">
                            <div class="col">
                                <label for="">Seleccione una imagen</label>
                                <input type="file" name="img"">
                              </div>
                        </div>
                        @foreach ($categories as $item)
                            <select class="form-control" name="category_id">
                                <option>{{$item->name}}</option>
                            </select>
                        @endforeach
                    </form>
                </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                        <button type="submit" class="btn btn-primary ">Registrar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
        <!---FIN MODAL-->
    </div>
</div>

@endcan
@endsection