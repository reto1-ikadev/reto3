@extends('layouts.headerfooter')
@section('content')


<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta estudiante</p>
    </div>
</div>

<div class="row justify-content-center mb-5" id="formAlta" >
    <div class="col-6">
        
        <form action="" class="row my-3">
            <div class="col-md-6">
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control" id="apellido" placeholder="Apellido" required>
            </div>

            <div class="row my-2"></div>

            <div class="col-md-6">
                <input type="text" class="form-control" id="dni" placeholder="Dni" required>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="email" placeholder="Email">
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>

            <div class="row my-2"></div>

            <div class="col-md-4">
                <input type="text" class="form-control" id="telefono" placeholder="Tel&eacute;fono" required>
            </div>
            <div class="col-4">
                <select class="form-select" id="grado">
                    <option selected disabled value="seleccionar">Grado</option>
                    <option  value="industriaD">Industria digital</option>
                </select>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="curso">
                    <option selected disabled value="seleccionar">Curso</option>
                    <option  value="primero">Primero</option>
                    <option  value="segundo">Segundo</option>
                    <option  value="tercero">Tercero</option>
                    <option  value="cuarto">Cuarto</option>
                </select>
            </div>

            <div class="col-md-2"></div>
            <div class="row my-2"></div>

            
            
            <div class="col-md-3">
                <input type="text" class="form-control" id="anyoAcademico" placeholder="Año academico" required>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="tutorA">
                    <option selected disabled value="seleccionar">Tutor academico</option>
                    <option  value="1">Pedro</option>
                    <option  value="2">Juan</option>
                    <option  value="3">Maria</option>
                    <option  value="4">Pablo</option>
                </select>
            </div>
             <div class="col-md-3">
                <select class="form-select" id="empresa">
                    <option selected disabled value="seleccionar">Empresa</option>
                    <option  value="1">Mercedes</option>
                    <option  value="2">Michelin</option>
                    <option  value="3">Regui</option>
                    <option  value="4">Otra</option>
                </select>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="tutorE">
                    <option selected disabled value="seleccionar">Tutor empresa</option>
                    <option  value="1">Pedro</option>
                    <option  value="2">Juan</option>
                    <option  value="3">Maria</option>
                    <option  value="4">Pablo</option>
                </select>
            </div>
           
            <div class="row my-2"></div>
            <div class="col-12 ">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>


@endsection