@extends('layouts.headerfooter')
@section('content')

<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta empresa</p>
    </div>
</div>

<div class="row justify-content-center mb-5" id="formAlta" >
    <div class="col-md-6">
        
        <form action="" class="row my-3">
        <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="nombre" placeholder="Nombre" required>
            </div>
            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="direccion" placeholder="Direcci&oacute;n" required>
            </div>

            <div class="row my-2"></div>

            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="cif" placeholder="CIF" required>
            </div>
            
            <div class="col-md-6 gy-2">
                <div class="input-group">
                    <input type="text" class="form-control" id="email" placeholder="Email">
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>

            <div class="row my-2"></div>

            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="telefono" placeholder="Tel&eacute;fono" required>
            </div>
            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="sector" placeholder="Sector" required>
            </div>
            <div class="row my-2"></div>
            <div class="col">
                <button class="btn btn-primary" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</div>


@endsection