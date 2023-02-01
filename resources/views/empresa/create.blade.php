@extends('layouts.headerfooter')
@section('content')

<div class="row justify-content-center mb-5 mt-5 ">
    <div class="col-12">
        <p class="display-5 text-center text-dark ">Dar de alta empresa</p>
    </div>
</div>

<div class="row justify-content-center mb-5" id="formAlta" >
    <div class="col-md-6">
        
        <form action="" id="formulario" method="post" class="row my-4">
            @csrf
        <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
            </div>
               
            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="direccion" placeholder="Direcci&oacute;n" required>
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

            <div class="row my-2"></div>

           
            <div class="col-md-6 gy-2">
                <input type="text" class="form-control" id="sector" name="sector" placeholder="Sector" required>
            </div>
            <div class="row my-2"></div>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direcci&oacute;n" hidden>

            <btn-validarempresa></btn-validarempresa>
        </form>
    </div>
</div>


@endsection