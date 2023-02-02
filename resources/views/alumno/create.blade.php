@extends('layouts.headerfooter')
@section('content')
@vite('resources/js/formularios/llenarCombos.js')

<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta estudiante</p>
    </div>
</div>

<div class="row justify-content-center mb-5" id="formAlta" >
    <div class="col-6">
        
        <form id="formulario" method="post" action="" class="row my-3">
            <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" id="nombre" value="Nombre" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="apellido" id="apellido" value="Apellido" required>
            </div>

            <div class="row my-2"></div>

            <div class="col-md-6">
                <input type="text" class="form-control" name="dni" id="dni" value="58018296Z" required>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email" value="email@gmao.com" required>
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="direccion" id="direccion" value="Avda general nº5 piso 7 letra A" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="ciudad" id="ciudad" value="Vitoria" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="provincia" id="provincia" value="Alava" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="cp" id="cp" value="01003" required>
            </div>
            <div class="row my-2"></div>

            <div class="col-md-4">
                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Tel&eacute;fono" required>
            </div>
            <div class="col-4">
                <select class="form-select" id="grado" name="grado" required>
                    <!-- Se llena con los datos de la base de datos -->
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" name="curso" id="curso"required>
                    
                </select>
            </div>

            <div class="col-md-2"></div>
            <div class="row my-2"></div>

            <div class="col-md-5">
                <input type="text" class="form-control"name="anyoAcademico" id="anyoAcademico" placeholder="Año academico" required>
            </div>
            
            <div class="col-md-5">
                <select class="form-select" name="tutorA" id="tutorA" required>
                    
                </select>
            </div>
            <div class="row mb-3"></div>
             <div class="col-md-5">
                <select class="form-select" nmae="empresa" id="empresa"required>
                    
                </select>
            </div>
            <div class="col-md-5">
                <select class="form-select" name="tutorE" id="tutorE"required>
                    
                </select>
            </div>
           
            <div class="row my-2"></div>
            <div class="col-12">
                <!--AQUI EL BTON COMPONENTE -->
                <input type="hidden"id="tipo" name="tipo" value="alumno">
                <btn-validar></btn-validar>
            </div>
        </form>
    </div>
</div>

@endsection