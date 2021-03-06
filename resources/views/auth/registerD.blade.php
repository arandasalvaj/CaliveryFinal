@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background-color: #ff9b22;"><h4>Registro Repartidor</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('registerD') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="rut" class="col-md-4 col-form-label text-md-right">{{ __('Rut') }}</label>
                            <div class="col-md-6">
                                <input id="rut" type="text" class="form-control @error('rut') Es invalido @enderror" name="rut" value="{{ old('rut') }}" required autocomplete="rut"autofocus>
                                @error('rut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                        
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') Es invalido @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') Es invalido @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') Es invalido @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contrase??a') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') Es invalido @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contrase??a') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                

                <div class="div py-3">
                    <hr class="my-auto flex-grow-1 pt-3">
                </div>
                    
                </div>
                <div class="col 12 text-center mb-5">
                    
                        @if (Route::has('register'))
                            <a class="btn btn-primary mx-3" href="{{ route('register') }}">{{ __('Cliente') }}</a>
                        @endif
                        @if (Route::has('registerS'))
                            <a class="btn btn-primary mx-3" href="{{ route('registerS') }}">{{ __('Vendedor') }}</a>
                        @endif
                    
                </div>
                <div class="div py-3">
                    <hr class="my-auto flex-grow-1 pt-3">
                </div>
                <div class="col 12 text-center mb-5">
                    <a class="btn btn-primary mx-3" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
