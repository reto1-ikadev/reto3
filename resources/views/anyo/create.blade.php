@extends('layouts.headerfooter')
@section('content')
<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Iniciar nuevo curso</p>
    </div>
</div>
<form action="{{ route('anyo.store') }}" method="post" class="row gy-4 justify-content-center" >
    @csrf
    <div class="col-6 col-md-3">
        <label for="fecha_inicio">Selecciones el inicio del curso</label>
        <input type="date" class="data-picker" name="fecha_inicio" id="fecha_Inicio"required>
    </div>
    <div class="col-6 col-md-3">
        <label for="fecha_fin">Selecciones el final del curso</label>
        <input class="data-picker"  type="date" name="fecha_fin" id="fecha_fin"required>
    </div>
    <div class="w-100"></div>
    <div class="col-2 ">
        <button class="btn btn-primary" type="submit">Guardar</button>
    </div>
</form>

@endsection