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
            @can('tutor_empresa')
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <h3>Próximamente</h3>
                    <img src="https://www.pngplay.com/wp-content/uploads/6/Coming-Soon-PNG-Clipart-Background.png" alt="" width="500px" height="250px">
                    </div>
                </div>
            @endcan
        </div>
    </div>

@endsection
