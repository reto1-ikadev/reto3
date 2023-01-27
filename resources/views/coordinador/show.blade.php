@extends('layouts.headerfooter')
@section('content')

<div class="container-fluid">
    <div class="row mt-4">
        <div class="col-md-3">
            <img class="img-fluid" alt="foto estudiante" src="{{ asset('images/campusVitoria.jpg') }}" />
        </div>

        <div class="col-md-9">
            <div class="card ">
                <h5 class="card-header ">
                    {{$estudiante}}
                </h5>
                <div class="card-body">
                    <p class="card-text">Apellido:</p>

                    <p class="card-text">Dni:</p>

                </div>
                <div class="card-footer ">
                    <p></p>
                </div>
            </div>
        </div>
    </div>
    <hr class="hr hr-blurry" />
    <div class="col">
        <div class="card ">
            <h5 class="card-header ">
                Ficha dual de {{$estudiante}}
            </h5>
            <div class="card-body">
                <p class="card-text">Email:</p>
                <p class="card-text">Curso:</p>
                <p class="card-text">Año academico:</p>
                <p class="card-text">Empresa:</p>
                <p class="card-text">Tutor universidad:</p>
                <p class="card-text">Contacto tutor universidad:</p>
                <p class="card-text">Tutor Empresa:</p>
                <p class="card-text">Contacto tutor empresa:</p>
            </div>
            <div class="card-footer ">
                <p></p>
            </div>
        </div>
    </div>
    <hr class="hr hr-blurry" />
    <div class="row">
        <div class="col-md-6"><!--En esta columna los desplegables para elegir año y curso -->
            <select class="form-select" aria-label="select">
                <option selected>Año academico</option>
                <option value="1">2022-2023</option>
                <option value="2">2021-2022</option>
                <option value="3">2020-2021</option>
            </select>
            <select class="form-select" aria-label="select">
                <option selected>Curso</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            
        </div><!-- FIN COLUMNA DESPLEGABLES -->
        <div class="col-md-6">
            <!--En esta columna los datos del tutor de la empresa -->
            <p display-2>Tutor por parte de la empresa</p>
            <p>Nombre y apellidos se cargan de la bd</p>
            <p>Email carga de la bd</p>
            <p>Departamento se carga de la bd</p>
        </div>
        <div class="col-md-6">
            <!--En esta columna los datos del tutor de la universidad -->
            <p display-2>Tutor por parte de la empresa</p>
            <p>Nombre y apellidos se cargan de la bd</p>
            <p>Email carga de la bd</p>
            <p>Departamento se carga de la bd</p>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <!-- En esta columna el desplegable para elegir la semana -->
        </div>
        <div class="col-12">
            <!-- En esta columna la tabla para mostrar el diario -->
        </div>

    </div>


</div>
@endsection