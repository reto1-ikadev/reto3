@extends('layouts.headerfooter')
@section('content')
@vite('resources/js/detalleEstudiante.js')
@include('alumno.formulario')


<div class="row mt-4">
    <input type="hidden" id="id_alumno" value="{{$estudiante->id}}" />
    <div class="col">
        <h5>Entradas del diario</h5>
        @can('tutor_empresa') <button id="botonDiario" type="button" class="btn btn-primary">Diario Nuevo</button> @endcan
    </div>
    <!--@can('tutor_empresa') <a href="{{ url('/diario', $estudiante->id) }}">Clickea aquí para guardar un diario nuevo</a> @endcan-->
    <div class="row"> <!-- FILTROS DIARIO-->
        <div class="col-3">
            <select id="filtroAnio" class="form-select" aria-label="select">
                <option value="no" selected>Filtrar por año</option>
            </select>
        </div>
        <div class="col-3">
            <select id="filtroSemana" class="form-select" aria-label="select">
                <option value="no" selected>Filtrar por semana</option>
            </select>
        </div>
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
                        </tr>
                    </thead>
                    <tbody id="listaDiarios">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="row mt-4">
    <div class="col">
        <h5>Seguimiento de las reuniones</h5>
        <button id="botonReunion" type="button" class="btn btn-primary">Reunion Nueva</button>
    </div>
    <!--<a href="{{ url('/reunion') }}">Clickea aquí para crear una reunion nueva</a>-->

    
    <div class="row"> <!-- FILTROS REUNIONES-->
        <div class="col-3">
            <select id="filtroAnioReunion" class="form-select" aria-label="select">
                <option value="no" selected>Filtrar por año</option>
            </select>
        </div>
        <div class="col-3">
            <select id="filtroConvocadores" class="form-select" aria-label="select">
                <option value="no" selected>Filtrar por convocador</option>
            </select>
        </div>
        <div class="col">
            <button id="filtrarReunion" type="button" class="btn btn-primary">Filtrar</button>
            <button id="resetReunion" type="button" class="btn btn-primary">Reset</button>
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
                            <th scope="col">Objetivos</th>
                            <th scope="col">Aspectos</th>
                        </tr>
                    </thead>
                    <tbody id="listaReuniones">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@vite('resources/js/filtrarDiarios.js')
@vite('resources/js/filtrarReuniones.js')

@endsection
