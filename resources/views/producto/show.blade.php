@extends('layouts.plantilla')
@section('seccion')
@can('Delivery')
    <h1>Bienvenido, Eres Repartidor</h1>
    <h1>Aca puedes ver los productos agregados</h1>
@endcan
@endsection