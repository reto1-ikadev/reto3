@extends('layouts.headerfooter')
@section('content')

<!--CARROUSEL o TABLAS-->

<div class="row justify-content-center mt-5">
    <div class="col-10">
        <h2>Empresas</h2>
        <form id="filtrosEmpresas" action="" method="get">

            <div class="row mb-5" id="filtrosEmp">
                <div class="col-3">
                    <input class="form-control" name="nombre" id="nombre" placeholder="Buscar por nombre">
                </div>
                <div class="col-3">
                    <input class="form-control" name="sector" id="sector" placeholder="Buscar por sector">
                </div>
                <div class="col-2">
                <button type="button" id="btn" class="btn btn-primary">Filtrar</button>&nbsp;<button type="button" id="btnReset" class="btn btn-primary">Reset</button>
                    <input type="hidden" name="tipo" id="tipo" value="filtros_empresas">
                </div>
                <div class="row mt-3 d-flex justify-content-end">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination" id="pagination">

                        </ul>
                    </nav>
                </div>
            </div>

        </form>
        <div id="accordion">

        </div>
    </div>
</div>

@vite(['resources/js/empresas.js'])

@endsection