@extends('layouts.headerfooter')
@section('content')
    @vite('resources/js/detalleEstudiante.js')
    @include('alumno.formulario')


    @include('alumno.diario')


    <div class="row mt-4">
        <div class="col">
            <h5>Seguimiento de las reuniones</h5>
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
                <button id="botonReunion" type="button" class="btn btn-primary">Reunion Nueva</button>
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
        <div class="col-12 d-flex justify-content-end mb-3">
            <a href="{{ route('calificacionesHistorial.create',$estudiante) }}"><button class="btn btn-primary">Evaluar</button></a>
        </div>
    </div>


    @vite('resources/js/filtrarDiarios.js')
    @vite('resources/js/filtrarReuniones.js')

@endsection

