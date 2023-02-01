@extends('layouts.headerfooter')

@section('content')
    @can('alumno')

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Alumno') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('Hola Alumno !') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endcan

    @can('tutores')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tutor Academico') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('Hola Tutor !') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

@endsection
