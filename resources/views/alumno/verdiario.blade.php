@extends('layouts.headerfooter')
@section('content')
    @include('alumno.diario')
    @vite('resources/js/filtrarDiarios.js')
@endsection

