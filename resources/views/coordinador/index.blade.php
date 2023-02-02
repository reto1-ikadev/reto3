@extends('layouts.headerfooter')
@section('content')

    <!--CARROUSEL o TABLAS-->

    <div class="row justify-content-center mt-5">
        <div class="col-10">
            @can('alumno')
                @include('alumno.tabla')
            @endcan
        </div>
    </div>
@endsection
