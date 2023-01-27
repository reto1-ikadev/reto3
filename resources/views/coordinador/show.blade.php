@extends('layouts.headerfooter')
@section('content')

<div class="container-fluid my-4">
    <div class="row mt-4 my-4">
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
    <div class="row"><!-- ROW PARA LA FICHA DUAL -->
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
    </div>

    <div class="row"><!-- CARD PARA EL DIARIO DEL ESTUDIANTE -->
        <div class="card ">
            <h5 class="card-header ">
                Diario semanal de {{$estudiante}}
            </h5>
            <div class="card-body">
                <div class="row">
                    <div class="col-5 my-2"><!--En esta columna los desplegables para elegir año y curso -->
                        <select class="form-select" aria-label="select">
                            <option selected>Año academico</option>
                            <option value="1">2022-2023</option>
                            <option value="2">2021-2022</option>
                            <option value="3">2020-2021</option>
                        </select>
                    </div>
                    <div class="col-5 my-2">
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
                        <p display-2>Tutor por parte de la universidad</p>
                        <p>Nombre y apellidos se cargan de la bd</p>
                        <p>Email carga de la bd</p>
                        <p>Departamento se carga de la bd</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4 my-2">
                        <select class="form-select" aria-label="select">
                            <option selected>Semana</option>
                            <option value="1">12/09/2022</option>
                            <option value="2">19/09/2022</option>
                            <option value="3">26/09/2022</option>
                        </select>
                        <!-- En esta columna el desplegable para elegir la semana -->
                    </div>
                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Actividades desarrolladas</th>
                                    <th>Reflexi&oacute;n sobre el aprendizaje y progreso en las competencias</th>
                                    <th>Identificaci&oacute;n de problemas o dificultades.
                                        Acciones de mejora a poner en marcha</th>
                                    <th>Comentarios del tutor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            <li>...</li>
                                            <li>...</li>
                                            <li>...</li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- En esta columna la tabla para mostrar el diario -->
                    </div>
                </div>
            </div>
            
        </div>
    </div>



</div>
@endsection