@extends('layouts.headerfooter')
@section('content')
    @vite('resources/js/detalleEstudiante.js')

<div class="row p-4 mb-4" id="datosPersonales"> <!--Este row contiene la foto y los datos personales-->
    <div class="d-none d-md-block col-md-4" id="foto">
        <img class="img-fluid" alt="foto estudiante" src="{{ asset('images/campusVitoria.jpg') }}" />
    </div>
    <div class="col-md-7 p-4 ms-5" id="formularioDP">
        <form action="" method="post" class="row gx-2 gy-2">
            <!-- Formulario para editar los datos personales del alumno -->
            <div class="col-12 d-flex mb-3">
                <h5>Datos personales</h5><button type="button" class="ms-5 align-center btn bg-primary btn-sm ms-2">Editar </button>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control " id="nombreE" placeholder="Nombre y Apellido" value="{{$estudiante->nombre." ".$estudiante->apellidos}}" disabled>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control " id="dni" placeholder="Dni" value="{{$estudiante->dni}}" disabled>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control " id="telefono" placeholder="Telefono" value="{{$estudiante->telefono}}" disabled>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control " id="email" placeholder="Email" value="{{$estudiante->user->email}}" disabled>
            </div>

            <div class="col-md-6 ">
                <input type="text" class="form-control " id="direccion" placeholder="Direccion" value="{{$estudiante->opcion_tipo->direccion}}" disabled>
            </div>

            <div class="col-md-6 ">
                <input type="text" class="form-control " id="curso" placeholder="Curso" value="{{$estudiante->opcion_tipo->curso->nombre." ". $estudiante->opcion_tipo->curso->grado->nombre}}" disabled>
            </div>
            <div class="col-4 offset-8">
                <button type="submit" class="ms-5 align-center btn bg-primary btn-sm ms-2">Guardar cambios </button>
            </div>

        </form>
    </div>
</div>
<div class="row mt-4">
    <div class="col">
        <h5>Entradas del diario</h5>
    </div>
    <div class="row"> <!-- FILTROS DIARIO-->
        <div class="col-3">
            <select class="form-select" aria-label="select">
                <option selected>Filtrar por año</option>
                <option value="1">Empresa1</option>
                <option value="2">Empresa2</option>
                <option value="3">Empresa3</option>
            </select>
        </div>
        <div class="col-3">
            <select class="form-select" aria-label="select">
                <option selected>Filtrar por curso</option>
                <option value="1">Empresa1</option>
                <option value="2">Empresa2</option>
                <option value="3">Empresa3</option>
            </select>
        </div>
        <div class="col-3">
            <select class="form-select" aria-label="select">
                <option selected>Filtrar por semana</option>
                <option value="1">Empresa1</option>
                <option value="2">Empresa2</option>
                <option value="3">Empresa3</option>
            </select>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary">Filtrar</button>
        </div>
    </div><!--FIN FILTROS-->

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Semana</th>
                            <th scope="col">Comentario del tutor</th>
                            <th scope="col">Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">12/09/2022</td>
                            <td>No se que comentar. No se que comentar</td>
                            <td><a href="{{ route('diario.show') }}">Ver m&aacute;s</a></td>

                        </tr>
                        <tr class="">
                            <td scope="row">12/09/2022</td>
                            <td>No se que comentar. No se que comentar</td>
                            <td><a href="{{ route('diario.show') }}">Ver m&aacute;s</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">
    <div class="col">
        <h5>Seguimiento del alumno/Reuniones</h5>
    </div>
    <div class="row"> <!-- FILTROS DIARIO-->
        <div class="col-3">
            <select class="form-select" aria-label="select">
                <option selected>Filtrar por año</option>
                <option value="1">Empresa1</option>
                <option value="2">Empresa2</option>
                <option value="3">Empresa3</option>
            </select>
        </div>
        <div class="col-3">
            <select class="form-select" aria-label="select">
                <option selected>Filtrar por curso</option>
                <option value="1">Empresa1</option>
                <option value="2">Empresa2</option>
                <option value="3">Empresa3</option>
            </select>
        </div>
        <div class="col-3">
            <select class="form-select" aria-label="select">
                <option selected>Filtrar por fecha</option>
                <option value="1">Empresa1</option>
                <option value="2">Empresa2</option>
                <option value="3">Empresa3</option>
            </select>
        </div>
        <div class="col">
            <button type="button" class="btn btn-primary">Filtrar</button>
        </div>
    </div><!--FIN FILTROS-->

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Asistentes</th>
                            <th scope="col">Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">12/09/2022</td>
                            <td>No se que comentar. No se que comentar</td>
                            <td>TA,TE</td>
                            <td> <a href="{{ route('reunion.show') }}">Ver m&aacute;s</a>
                        </td>

                        </tr>
                        <tr class="">
                            <td scope="row">12/09/2022</td>
                            <td>No se que comentar. No se que comentar</td>
                            <td>TA,TE</td>
                            <td> <a href="{{ route('reunion.show') }}">Ver m&aacute;s</a>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection
