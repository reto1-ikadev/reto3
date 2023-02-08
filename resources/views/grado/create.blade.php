@extends('layouts.headerfooter')
@section('content')
@vite('resources/js/formularios/llenarCombos.js')

<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta grado</p>
    </div>
</div>
<form id="formulario" method="post" action="" class="row my-3 justify-content-center">
    <div class="col-6">
        <div class="row gy-3">
            <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
            </div>
            <div class="col-md-5">
                <select class="form-select" name="tutorA" id="tutorA" required>

                </select>
            </div>
            <div>
                <input type="hidden" id="tipo" name="tipo" value="grado">
                <input type="submit" class="btn btn-primary" id="altaGrado" name="altaGrado" value="Guardar">
            </div>
        </div>
    </div>
</form>

@vite(['resources/js/funciones/validarDatosGrado.js'])
@endsection
