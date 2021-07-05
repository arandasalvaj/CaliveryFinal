@extends('layouts.layoutsC')
@can('Customer')
@section('contenido')

<div class="container-fluid d-flex justify-content-center">
<div class="row">
    <div class="col-12">
        <h1 class="display-1 my-5">Gracias por comprar!</h1>
        <div class="row ">
            <div class="col-6 my-5 d-flex justify-content-center ">
                <a class="nav-link " href="{{ url('/home') }}">
                    <button type="submit" class="btn btn-primary">Inicio</button>
                </a>
            </div>
            <div class="col-6 my-5 d-flex justify-content-center ">
                <a class="nav-link" href="{{ url('/home') }}">
                    <button type="submit" class="btn btn-primary">Ordenes</button>
                </a>
            </div>
        </div>
    </div>
</div>

</div>
@endsection    
@endcan