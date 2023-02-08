@extends('layouts.headerfooter')
@section('content')
@vite('resources/js/formularios/llenarCombos.js')

<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta tutor de empresa</p>
    </div>
</div>



<form id="formulario" method="post" action="" class="row my-3 justify-content-center">
    <div class="col-6">
        <div class="row gy-3">
            <div class="col-6">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre"  required>
            </div>
            <div class="col-md-6">

                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellidos"  required>
            </div>
            <div class="row my-2"></div>
            <div class="col-md-6">

                <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni"  required>
            </div>
            <div class="col-md-6">

                <div class="input-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>
            <div class="row my-2"></div>
            <div class="col-md-6">

                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Tel&eacute;fono"  required>
            </div>

            <div class="col-md-2"></div>
            <div class="row my-2"></div>
            <div class="col-md-6 ">
                <input type="text" class="form-control" id="dept" name="departamento" placeholder="Departamento"  required>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="empresa" name="empresa">

                </select>
            </div>
            <div class="row my-2"></div>
            <div class="col-12 ">
                <!--AQUI EL BTON COMPONENTE -->
                <input type="hidden" name="tipo" id="tipo" value="tutor_empresa">
                <input type="hidden"id="pass" name="password" value="password">
                <btn-validar></btn-validar>
            </div>
        </div>
    </div>
</form>



@endsection
