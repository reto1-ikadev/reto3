@extends('layouts.headerfooter')
@section('content')
@vite('resources/js/formularios/llenarCombos.js')

<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta estudiante</p>
    </div>
</div>



<form id="formulario" method="post" action="" class="row my-3 justify-content-center">

    <div class="col-6">
        <div class="row gy-3">
            <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellidos" required>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control" name="dni" id="dni" placeholder="DNI" required>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="email" required>
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Provincia" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="cp" id="cp" placeholder="CP" required>
            </div>
            <div class="col-md-6    ">
                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Tel&eacute;fono" required>
            </div>
            <div class="col-6">
                <select class="form-select" id="grado" name="grado" required>
                    <!-- Se llena con los datos de la base de datos -->
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-select" name="curso" id="curso" required>

                </select>
            </div>
            <div class="col-md-6">
                <select class="form-select" name="tutorA" id="tutorA" required>

                </select>
            </div>
            <div class="col-md-6">
                <select class="form-select" name="tutorE" id="tutorE" required>
                </select>
            </div>
            <div class="row my-2"></div>
            <div class="col-12">
                <!--AQUI EL BTON COMPONENTE -->
                <input type="hidden"id="tipo" name="tipo" value="alumno">
                <input type="hidden"id="pass" name="password" value="password">
                <btn-validar></btn-validar>
            </div>
        </div>
    </div>
</form>


@endsection
