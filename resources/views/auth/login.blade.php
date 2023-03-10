@extends('layouts.auth')

@section('content')
    <div id="main-wrapper" class="container ">
        <div class="row justify-content-center ">
            <div class="col-xl-10">
                <div class="card border-1">
                    <div class="card-body p-0">
                        <div class="row">
                              <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="mb-5">
                                        <h3 class="h4 font-weight-bold text-theme">Iniciar Sesión</h3>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Electrónico') }}</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-md-6 offset-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                    <label class="form-check-label" for="remember">
                                                        {{ __('Acuérdate de mí') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-0">
                                            <div class="col-8 offset-md-4 d-flex justify-content-center flex-column">
                                                <button type="submit" class="btn btn-primary mb-2 w-50">
                                                    {{ __('Iniciar Sesión') }}
                                                </button>

                                                @if (Route::has('password.request'))
                                                    <a class="btn-link" href="{{ route('password.request') }}">
                                                        {{ __('¿Olvidaste la contraseña?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6  p-0 d-lg-inline-block ">
                                <div class="div-logo rounded-right d-flex align-items-center justify-content-center" style="border-top-right-radius: 0.36rem; border-bottom-right-radius:0.36rem; " >
                                    <div class="logo d-none d-lg-block ">
                                        <img src="{{asset('images/logo.svg')}}" alt="" class="w-75 h-50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
        </div>
    </div>
@endsection
