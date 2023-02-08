@extends('layouts.headerfooter')
@section('content')

<!--CARROUSEL o TABLAS-->

<div class="row justify-content-center mt-1 mb-2">
    <div class="col-10">
        <div class="row">
            <h2 class="mb-4">Empresas</h2>
            <form id="filtrosEmpresas" action="" method="get">

                <div class="row mb-2" id="filtrosEmp">
                    <div class="col-12 col-md-4  mb-2">
                        <input class="form-control" name="nombre" id="nombre" placeholder="Buscar por nombre">
                    </div>
                    <div class="col-12 col-md-4 mb-2">
                        <input class="form-control" name="sector" id="sector" placeholder="Buscar por sector">
                    </div>
                    <div class="col-2 d-flex flex-row mb-2">
                        <button type="button" id="btn" class="btn btn-primary">Filtrar</button>&nbsp;<button type="button" id="btnReset" class="btn btn-primary">Reset</button>
                        <input type="hidden" name="tipo" id="tipo" value="filtros_empresas">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div id="accordion" class="mt-2">

        </div>
    </div>
    <div class="row ">
        <nav class="col d-flex justify-content-center">
            <ul class="pagination" id="pagination">
                <li class="page-item">
                    <button class="page-link" href="#" id="anterior" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </button>
                </li>
                <li class="page-item"><button disabled id="paginaActual" class="page-link" href="#"></button></li>
                <li class="page-item">
                    <button class="page-link" id="siguiente" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </button>
                </li>
            </ul>
        </nav>
    </div>
</div>
</div>

@vite(['resources/js/empresas.js'])

@endsection
