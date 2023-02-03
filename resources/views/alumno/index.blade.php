@extends('layouts.headerfooter')
@section('content')
@vite('resources/js/formularios/llenarCombos.js')
    <!--CARROUSEL o TABLAS-->

    <div class="row justify-content-center mt-5">
        <div class="col-10">
                <h2>Estudiante</h2>
                <form id="filtrosEstudiantes" action="" method="get" >
                    <div class="row mb-5" id="filtrosEst">
                        <div class="col">
                            <select class="form-select" aria-label="select" id="grado" name="grado">

                            </select>
                        </div>
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
                        <div class="row mt-3 d-flex justify-content-end">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination" id="pagination">

                                </ul>
                            </nav>
                        </div>
                    </div>
                </form>
                        <table class="table mt-2">
                            <thead>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Grado</td>
                            <td>Curso</td>
                            <td>Empresa</td>
                            <td>Detalles</td>
                            </thead>
                           <tbody id="tabla">

                           </tbody>

                        </table>
        </div>
    </div>

    @vite(['resources/js/estudiantes.js'])

@endsection
