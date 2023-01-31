@extends('layouts.headerfooter')

@section('content')
    @can('alumno')

        <h1>Hola Alumno</h1>

    @endcan

    @can('tutor_academico')

        <h1>Hola Academico</h1>

    @endcan
@endsection
