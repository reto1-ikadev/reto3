@extends('layouts.headerfooter')
@section('content')
<div class="row mt-5">
    <div class="col mb-3">
        <h2>Detalles de la reuni&oacute;n creada</h2>
    </div>
    @foreach ($array as $dato)
        <p>Persona: {{$dato}}</p>
    @endforeach
    <p>Fecha: {{$fecha}}</p>
    <p>Objetivos: {{$textArea}}</p>
    <p>Aspectos: {{$aspectos}}</p>

    <a href="{{route('inicio.index')}}">Volver</a>
</div>
@endsection
