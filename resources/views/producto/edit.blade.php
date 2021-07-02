@can('Store')
<div class="modal fade" id="exampleModal01" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel01" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
          <div class="modal-header bg-warning ">
          <h5 class="modal-title " id="exampleModalLabel">Editar Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <form action="{{ route('producto.update',$product->id) }}" method="POST">
              @csrf
              @method('PUT')
              
              <div class="row py-2">
                  <div class="col">
                      <label for="">Nombre:</label>
                    <input type="text" class="form-control" value="{{$product->name}}" name="name">
                  </div>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <label for="">Precio:</label>
                        <input type="text" class="form-control" value="{{$product->price}}" name="price">
                      </div>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <label for="">Detalle:</label>
                        <textarea class="form-control" rows="5" value="{{$product->detail}}" name="detail"></textarea>
                      </div>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <label for="">Stock:</label>
                        <input type="number" name="stock" min="1" max="100" value="{{$product->stock}}" >
                      </div>
                </div>
                <div class="row py-2">
                    <div class="col">
                        <label for="">Seleccione una imagen:</label>
                        <input type="file" name="img" value="{{$product->img}}">
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
        <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary ">Guardar Cambios</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endcan

