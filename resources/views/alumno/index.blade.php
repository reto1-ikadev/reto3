@extends('layouts.headerfooter')
@section('content')

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
                        <div class="col-2">
                            <button type="submit" id="btn" class="btn btn-primary">Filtrar</button>
                            <input type="hidden" name="tipo" id="tipo" value="filtros_estudiante">
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
@endsection
