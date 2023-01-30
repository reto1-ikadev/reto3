@extends('layouts.headerfooter')
@section('content')


<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta estudiante</p>
    </div>
</div>

<div class="row justify-content-center mb-5" id="formAlta" >
    <div class="col-6">
        
        <form id="formulario" method="post" action="" class="row my-3">
            <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Apellido" required>
            </div>

            <div class="row my-2"></div>

            <div class="col-md-6">
                <input type="text" class="form-control" name="dni" id="dni" placeholder="Dni" required>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" required>
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Avda general nº5 piso 7 letra A" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Vitoria" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Alava" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" name="cp" id="cp" placeholder="01003" required>
            </div>
            <div class="row my-2"></div>

            <div class="col-md-4">
                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Tel&eacute;fono" required>
            </div>
            <div class="col-4">
                <select class="form-select" id="grado" name="grado" required>
                    <option selected disabled value="seleccionar">Grado</option>
                    <option  value="industriaD">Industria digital</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" name="curso" id="curso"required>
                    <option selected disabled value="seleccionar">Curso</option>
                    <option  value="primero">Primero</option>
                    <option  value="segundo">Segundo</option>
                    <option  value="tercero">Tercero</option>
                    <option  value="cuarto">Cuarto</option>
                </select>
            </div>

            <div class="col-md-2"></div>
            <div class="row my-2"></div>

            <div class="col-md-5">
                <input type="text" class="form-control"name="anyoAcademico" id="anyoAcademico" placeholder="Año academico" required>
            </div>
            
            <div class="col-md-5">
                <select class="form-select" name="tutorA" id="tutorA" required>
                    <option selected disabled value="seleccionar">Tutor academico</option>
                    <option  value="1">Pedro</option>
                    <option  value="2">Juan</option>
                    <option  value="3">Maria</option>
                    <option  value="4">Pablo</option>
                </select>
            </div>
            <div class="row mb-3"></div>
             <div class="col-md-5">
                <select class="form-select" nmae="empresa" id="empresa"required>
                    <option selected disabled value="seleccionar">Empresa</option>
                    <option  value="1">Mercedes</option>
                    <option  value="2">Michelin</option>
                    <option  value="3">Regui</option>
                    <option  value="4">Otra</option>
                </select>
            </div>
            <div class="col-md-5">
                <select class="form-select" name="tutorE" id="tutorE"required>
                    <option selected disabled value="seleccionar">Tutor empresa</option>
                    <option  value="1">Pedro</option>
                    <option  value="2">Juan</option>
                    <option  value="3">Maria</option>
                    <option  value="4">Pablo</option>
                </select>
            </div>
           
            <div class="row my-2"></div>
            <div class="col-12">
                <!--AQUI EL BTON COMPONENTE -->
                <input type="hidden" name="tipo" value="alumno">
                <btn-validar></btn-validar>
            </div>
        </form>
    </div>
</div>

@endsection