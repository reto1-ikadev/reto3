@extends('layouts.headerfooter')
@section('content')

<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta empresa</p>
    </div>
</div>

<form id="formulario" method="post" action="" class="row my-3 justify-content-center">
    <div class="col-6">
        <div class="row gy-3">
            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>

            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" name="calle" id="calle" placeholder="Direccion" required>
            </div>
            <div class="row my-2"></div>
            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad" required>
            </div>
            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" name="provincia" id="provincia" placeholder="Provincia" required>
            </div>
            <div class="row my-2"></div>
            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" name="cp" id="cp" placeholder="CP" required>
            </div>


            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="cif" name="cif" placeholder="CIF" required>
            </div>
            <div class="row my-2"></div>
            <div class="col-md-6 gy-2">
                <div class="input-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    <span class="input-group-text" id="prefijo">@</span>
                </div>
            </div>

            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="sector" name="sector" placeholder="Sector" required>
            </div>
            <div class="row my-2"></div>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direcci&oacute;n" hidden>
            <input type="hidden" id="tipo" value="empresa">
            <btn-validarempresa></btn-validarempresa>
        </div>
    </div>

</form>


@endsection
