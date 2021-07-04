@extends('layouts.layoutsV')
@section('contenido')
@can('Store')
<div class="container-fluid px-4 ">
         <div class="row border border-secondary mb-4">
          <div class="card-body">
            <div class="col-md-4 mb-3">
            @foreach ($tiendas as $store)
              <label">Nombre:</label>
              <h3>{{$store->name }}</h3>
            </div>
            <div class="col-md-4 mb-3">
              <label >Dirección:</label>
              <h3>{{$store->address }}</h3>
            </div> 
            <div class="col-md-4 mb-3">
              <label>Telefono:</label>
              <h3>{{$store->cellphone }}</h3>
            </div> 
            <div class="col-md-4 mb-3">
              <label >Correo de contacto:</label>
              <h3>{{$store->email }}</h3>
            </div>  
          </div> 
         </div> 
              <!---Inicio Tabla-->
              <table class="table table-bordered ">
                  <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Dirección</th>
                      <th>Telefono</th>
                      <th>Correo</th>
                      <th width="280px">Actions</th>
                  </tr>
                  @foreach ($tiendas as $store)
                      <tr>
                          <td>{{ $store->id }}</td>
                          <td>{{ $store->name }}</td>
                          <td>{{ $store->address }}</td>
                          <td>{{ $store->cellphone }}</td>
                          <td>{{ $store->email }}</td>
                          <td>
                            <form action="{{ route('tienda.destroy',$store->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <a class="btn btn-dark" href="#">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Editar</button>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                              </a>
                            </form>
                          </td>
                      </tr>
                  @endforeach
              </table>
            <!---Termino Tabla-->
            <!---Inicio Modal-->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                      <div class="modal-header bg-warning ">
                      <h5 class="modal-title " id="exampleModalLabel">Editar Tienda</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <form action="{{route('tienda.update',$store->id)}}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="row py-2">
                            <div class="col">
                                <label for="">Nombre</label>
                              <input type="text" class="form-control" id="email" value="{{$store->name}}" name="name">
                            </div>
                          </div>
                          <div class="row py-2">
                              <div class="col">
                                  <label for="">Dirección</label>
                                <input type="text" class="form-control" id="email" value="{{$store->address}}" name="address">
                              </div>
                            </div>
                          <div class="row py-2">
                              <div class="col">
                                  <label for="">Telefono</label>
                                  <input type="text" class="form-control" value="{{$store->cellphone}}" name="cellphone">
                                </div>
                          </div>
                          <div class="row py-2">
                              <div class="col">
                                  <label for="">Email</label>
                                  <input type="email" class="form-control" value="{{$store->email}}" name="email">
                                </div>
                          </div>
                        
                  </div>
                    <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                          <button type="submit" class="btn btn-primary ">Guardar Cambios</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!----Termino Modal---->
            @endforeach
</div>
@endcan
@endsection
