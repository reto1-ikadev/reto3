@extends('layouts.headerfooter')
@section('content')
@vite('resources/js/formularios/llenarCombos.js')

<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta tutor acad&eacute;mico</p>
    </div>
</div>



<form id="formulario" method="post" class="row my-3 justify-content-center">
    @csrf
    @method('POST')
    <div class="col-6">
        <div class="row gy-3">
            <div class="col-md-6">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">

                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos" required>
            </div>
            <div class="row my-2"></div>
            <div class="col-md-6">

                <input type="text" class="form-control" id="dni" placeholder="Dni" name="dni" placeholder="DNI" required>
            </div>
            <div class="col-md-6">

                <input type="text" class="form-control" id="telefonoAcademico" name="telefonoAcademico" placeholder="Telefono Academico">

            </div>
            <div class="row my-2"></div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono Personal" required>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>

            <div class="row my-2"></div>
            <div class="col-12 ">
                <!--AQUI EL BTON COMPONENTE -->
                <input type="hidden"id="tipo" name="tipo" value="tutor_academico">
                <input type="hidden"id="pass" name="password" value="password">
                <btn-validar></btn-validar>
            </div>
        </div>
    </div>
</form>



@endsection
