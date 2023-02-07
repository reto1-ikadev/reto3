@extends('layouts.headerfooter')
@section('content')
@vite('resources/js/formularios/llenarCombos.js')
    <!--CARROUSEL o TABLAS-->

    <div class="row justify-content-center mt-1 mb-2">
        <div class="col-11">
            <div class="row mb-3">
                <h2>Estudiantes del Grado de {{$grado->nombre}}</h2>
                <form id="filtrosEstudiantes" action="" method="get" >
                    <div class="row mb-2" id="filtrosEst">

                        <div class="col">
                            <select class="form-select" aria-label="select" id="curso" name="curso">

                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-select" aria-label="select" id="empresa" name="empresa">

                            </select>
                        </div>
                        <div class="col">
                            <input class="form-control" name="nombre" placeholder="Buscar por nombre">
                        </div>
                        <div class="col-2 d-flex flex-row">
                            <button type="button" id="btn" class="btn btn-primary">Filtrar</button>&nbsp;<button type="button" id="btnReset" class="btn btn-primary">Reset</button>
                            <input type="hidden" name="tipo" id="tipo" value="filtros_estudiante">
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                        <table class="table table-light table-striped">
                            <thead class="th">
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Grado</th>
                            <th scope="col">Curso</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Detalles</th>
                            </thead>
                           <tbody id="tabla">

                           </tbody>

                        </table>
            </div>
            <div class="row">
                <nav class=" d-flex justify-content-center" >
                    <ul class="pagination" id="pagination">
                        <li class="page-item">
                            <button class="page-link" href="#" id="anterior" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </button>
                        </li>
                        <li class="page-item"><button disabled id="paginaActual" class="page-link" href="#"></button></li>
                        <li class="page-item">
                            <button class="page-link"  id="siguiente" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @can('coordinador')
        @vite(['resources/js/buscarEstudiantes.js'])
    @endcan


@endsection
