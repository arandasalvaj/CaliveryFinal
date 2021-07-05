@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header text-center" style="background-color: #ff9b22;"><h4>Bienvenido</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuerdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ingresar') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu Contraseña?') }}
                                    </a>
                                @endif
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
                                @if (Route::has('registerD'))
                                    <a class="btn btn-primary mx-3" href="{{ route('registerD') }}">{{ __('Repartidor') }}</a>
                                @endif
                                @if (Route::has('registerS'))
                                    <a class="btn btn-primary mx-3" href="{{ route('registerS') }}">{{ __('Vendedor') }}</a>
                                @endif
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
