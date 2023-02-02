@extends('layouts.headerfooter')
@section('content')
<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Iniciar nuevo curso</p>
    </div>
</div>
<form action="{{ route('anyo.store') }}" method="post" class="row" >
    @csrf
    <div class="col-6">
        <label for="fInicio">Selecciones el inicio del curso</label>
        <input type="date" name="fecha_inicio" id="fecha_Inicio"required>
    </div>
    <div class="col-6">
        <label for="fFin">Selecciones el final del curso</label>
        <input type="date" name="fecha_fin" id="fecha_fin"required>
    </div>
    <div class="col">
        <button type="submit">Guardar</button>
    </div>
</form>

@endsection