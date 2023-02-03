@extends('layouts.headerfooter')
@section('content')
@vite('resources/js/formularios/llenarCombos.js')

<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta tutor de empresa</p>
    </div>
</div>

<div class="row justify-content-center mb-5" id="formAlta" >
    <div class="col-6">
        
        <form id="formulario" method="post" action="" class="row my-3">
            <div class="col-6">
                <input type="text" class="form-control" id="nombre" name= "nombre" placeholder="Nombre"value="Aritz" required>
            </div>
            <div class="col-md-6">
               
                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido"value="Castillo" required>
            </div>
            <div class="row my-2"></div>
            <div class="col-md-6">
                
                <input type="text" class="form-control" id="dni" name="dni" placeholder="Dni" value="72738006T" required>
            </div>
            <div class="col-md-6">
               
                <div class="input-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="aritz@gmail.com">
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>
            <div class="row my-2"></div>
            <div class="col-md-6">
                
                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Tel&eacute;fono"value="666789987" required>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="grado" name="grado">
                    
                </select>
            </div>
            <div class="col-md-2"></div>
            <div class="row my-2"></div>
            <div class="col-md-6 ">
                <input type="text" class="form-control" id="dept" name="departamento" placeholder="Departamento" value="informatica" required>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="empresa" name="empresa">
                    
                </select>
            </div>
            <div class="row my-2"></div>
            <div class="col-12 ">
                <!--AQUI EL BTON COMPONENTE -->
                <input type="hidden" name="tipo" id="tipo" value="tutor_empresa">
                <btn-validar></btn-validar>
            </div>
        </form>
    </div>
</div>


@endsection