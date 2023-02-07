@extends('layouts.headerfooter')
@section('content')
<div class="row mt-5">
    <div class="col mb-3">
        <h2>No existe el asistente especificado: {{ $asisNoEnc }}</h2>

        <a href="/reunion">Volver</a>
    </div>
@endsection