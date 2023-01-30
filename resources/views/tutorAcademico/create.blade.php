@extends('layouts.headerfooter')
@section('content')


<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta tutor acad&eacute;mico</p>
    </div>
</div>

<div class="row justify-content-center mb-5" id="formAlta" >
    <div class="col-6">
        
        <form id="formulario" method="post" action="" class="row my-3">
            <div class="col-md-6">
                <input type="text" class="form-control" id="nombre" name="nombre" value = "Joseba" required>
            </div>
            <div class="col-md-6">
               
                <input type="text" class="form-control" id="apellido" name="apellido" value = "Gomez" required>
            </div>
            <div class="row my-2"></div>
            <div class="col-md-6">
                
                <input type="text" class="form-control" id="dni" placeholder="Dni" name="dni" value = "72738006T" required>
            </div>
            <div class="col-md-6">
               
                <input type="text" class="form-control" id="telefonoAcademico" name="telefonoAcademico" value = "666777888">
               
            </div>
            <div class="row my-2"></div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="telefono" name="telefono" value = "999333222" required>
            </div>
            <div class="col-md-4">
                
                <select class="form-select" id="grado">
                    <option selected disabled value="seleccionar">Grado</option>
                    <option  value="industriaD" selected>Industria digital</option>
                </select>
            </div>
            <div class="col-md-2"></div>
            <div class="row my-2"></div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email" value="email@gmao.com" required>
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>
            <div class="col-md-4 form-check form-switch ms-2">
                <label class="form-check-label" for="coorCheck">Coordinador</label> 
                <input class="form-check-input" type="checkbox" name="coordinador" id="coorCheck">
                
            </div>
            <div class="row my-2"></div>
            <div class="col-12 ">
                <!--AQUI EL BTON COMPONENTE -->
                <input type="hidden" name="tipo" value="tutor_academico">
                <btn-validar></btn-validar>
            </div>

        </form>
    </div>
</div>


@endsection