@extends('layouts.layoutsC')
@can('Customer')
@section('contenido')

<div class="container">
<div class="row">
    <div class="col-12">
        @foreach (ordenesC() as $orden)
        <div class="card my-4">
            <div class="card-body">
              <div class="row">
                  <div class="col-3">
                    <div class="div text-center">
                      <h5 class="card-title">Orden N-{{$orden->id}}</h5>
                      <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                      </svg>
                    </div>
                  </div>
                  <div class="col-6">
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                  <div class="col-3">
                    <div class="div py-3 text-center">
                      <a href="{{route('detalleOrden',$orden->id)}}" class="btn btn-primary">Ver Compra</a>  
                    </div>
                   
                    <div class="div py-3 text-center">
                      <a href="#" class="btn btn-outline-primary">Ver Seguimiento</a>  
                    </div>
                    
                  </div>
                
            


              </div>

            </div>
        </div>
        @endforeach
    </div>
</div>
</div>

@endsection    
@endcan