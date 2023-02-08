@extends('layouts.headerfooter')
@section('content')

<div class="row justify-content-center bg-light mb-5">
    <div class="col-12">
        <p class="display-4 text-center text-dark ">Dar de alta coordinadores</p>
    </div>
</div>

<div class="row justify-content-center" id="formAlta">
    <div class="col-6">
        
        <form action="" class="row my-3">
            <div class="col-6">
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
            </div>
            <div class="col-6">
                <input type="text" class="form-control" id="apellido" placeholder="Apellido" required>
            </div>
            <div class="row my-2"></div>
            <div class="col-6">
                
                <input type="text" class="form-control" id="dni" placeholder="Dni" required>
            </div>
            <div class="col-6">
               
                <div class="input-group">
                    <input type="text" class="form-control" id="email" placeholder="Email">
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>
            <div class="row my-2"></div>
            <div class="col-6">
                
                <input type="text" class="form-control" id="telefono" placeholder="Tel&eacute;fono" required>
            </div>
            <div class="col-4">
                
                <select class="form-select" id="grado">
                    <option selected disabled value="seleccionar">Grado</option>
                    <option  value="industriaD">Industria digital</option>
                </select>
            </div>
            <div class="col-2"></div>
            <div class="row my-2"></div>
            <div class="col-6">
                
                <input type="text" class="form-control" id="dept"placeholder="Departamento" required>
            </div>
            <div class="row my-2"></div>
            
            <div class="row my-2"></div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>



@endsection