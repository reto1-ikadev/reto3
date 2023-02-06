@extends('layouts.headerfooter')
@section('content')
@vite('resources/js/detalleEstudiante.js')
@include('alumno.formulario')


<div class="row mt-4">
    <input type="hidden" id="id_alumno" value="{{$estudiante->id}}" />
    <div class="col">
        <h5>Entradas del diario</h5>
    </div>
    <a href="{{ url('/diario', $estudiante->id) }}">Clickea aquí para guardar un diario nuevo</a>
    <div class="row"> <!-- FILTROS DIARIO-->
        <div class="col-3">
            <select id="filtroAnio" class="form-select" aria-label="select">
                <option value="no" selected>Filtrar por año</option>
                <!--<option value="1">Empresa1</option>
                <option value="2">Empresa2</option>
                <option value="3">Empresa3</option>-->
            </select>
        </div>
        <!--<div class="col-3">
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
        </div>-->
        <div class="col">
            <button id="filtrar" type="button" class="btn btn-primary">Filtrar</button>
            <button id="reset" type="button" class="btn btn-primary">Reset</button>
        </div>
    </div><!--FIN FILTROS-->

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table id="tabla" class="table">
                    <thead>
                        <tr>
                            <th scope="col">Semana</th>
                            <th scope="col">Actividades Realizadas</th>
                            <th scope="col">Actividades Comentario</th>
                            <th scope="col">Aprendizaje</th>
                            <th scope="col">Aprendizaje Comentario</th>
                            <th scope="col">Problemas</th>
                            <th scope="col">Problemas Comentario</th>
                            <!--<th scope="col">Detalles</th>-->
                        </tr>
                    </thead>
                    <tbody id="listaDiarios">
                        <!--<tr class="">
                            <td scope="row">12/09/2022</td>
                            <td>No se que comentar. No se que comentar</td>
                            <td><a href="{{ route('diario.show') }}">Ver m&aacute;s</a></td>

                        </tr>-->
                        <!--<tr class="">
                            <td scope="row">12/09/2022</td>
                            <td>No se que comentar. No se que comentar</td>
                            <td><a href="{{ route('diario.show') }}">Ver m&aacute;s</a></td>
                        </tr>-->
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
    <div class="row"> <!-- FILTROS REUNIONES-->
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
                            <td>TA,TE,TO</td>
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
    <div class="row">
        <a href="{{ route('calificacionesHistorial.create',$estudiante) }}"><button class="btn btn-primary">Evaluar</button></a>
    </div>

</div>

@vite('resources/js/filtrarDiarios.js')

@endsection