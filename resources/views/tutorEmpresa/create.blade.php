@extends('layouts.headerfooter')
@section('content')


<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta tutor de empresa</p>
    </div>
</div>

<div class="row justify-content-center mb-5" id="formAlta" >
    <div class="col-6">
        
        <form action="" class="row my-3">
            <div class="col-6">
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
            <div class="col-md-6">
                
                <input type="text" class="form-control" id="telefono" placeholder="Tel&eacute;fono" required>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="grado">
                    <option selected disabled value="seleccionar">Grado</option>
                    <option  value="industriaD">Industria digital</option>
                </select>
            </div>
            <div class="col-md-2"></div>
            <div class="row my-2"></div>
            <div class="col-md-6 ">
                <input type="text" class="form-control" id="dept"placeholder="Departamento" required>
            </div>
            <div class="col-md-4">
                <select class="form-select" id="empresa">
                    <option selected disabled value="seleccionar">Empresa</option>
                    <option  value="industriaD">Mercedes</option>
                    <option  value="industriaD">Michelin</option>
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