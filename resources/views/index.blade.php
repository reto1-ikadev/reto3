@extends('layouts.headerfooter')
@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-10">
            @can('alumno')
                @include('alumno.tabla')
                @include('diario.show')
            @endcan
            @can('tutores')
                @include('tutorAcademico.tabla')

            @endcan
        </div>
    </div>

@endsection
