@extends('layouts.headerfooter')
@section('content')

    <div class="row justify-content-center mt-5">
        <div class="col-10">
            @can('alumno')
                @include('alumno.tabla')
                @include('diario.show')
            @endcan
<<<<<<< HEAD
            @can('tutor_academico')
                
=======
            @can('tutores')
            <h3>Tutor</h3>
>>>>>>> 0c98d596d04c7547274f512f166c44c5ed580750
            @endcan
        </div>
    </div>

@endsection
