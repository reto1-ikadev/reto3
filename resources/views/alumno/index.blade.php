@extends('layouts.headerfooter')
@section('content')

    <!--CARROUSEL o TABLAS-->

    <div class="row justify-content-center mt-5">
        <div class="col-10">
                <h2>Estudiante</h2>
                <form id="filtrosEstudiantes" action="" method="get" >
                    <div class="row mb-5" id="filtrosEst">
                        <div class="col">
                            <select class="form-select" aria-label="select" name="grado">
                                <option value="0" selected>Grado</option>
                                <option value="1">Primero</option>
                                <option value="2">Segundo</option>
                                <option value="3">Tercero</option>
                                <option value="3">Cuarto</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" aria-label="select" name="curso">
                                <option value="0" selected>Curso</option>
                                <option value="1">Primero</option>
                                <option value="2">Grado dos</option>
                                <option value="7">Grado tres</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-select" aria-label="select" name="empresa">
                                <option value="0" selected>Empresa</option>
                                <option value="1">Empresa1</option>
                                <option value="2">Empresa2</option>
                                <option value="3">Empresa3</option>
                            </select>
                        </div>
                        <div class="col">
                            <input class="form-control" name="nombre"  placeholder="Nombre">
                        </div>
                        <div class="col-2 d-flex flex-row">
                            <button type="button" id="btn" class="btn btn-primary">Filtrar</button>&nbsp;<button type="button" id="btnReset" class="btn btn-primary">Reset</button>
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
    <script src="{{asset("js/estudiantes.js")}}"></script>
@endsection
