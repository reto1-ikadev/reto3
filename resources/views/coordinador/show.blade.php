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
                Ficha dual
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
        
        <div class="col-md-12">
            <div class="card ">
                <h5 class="card-header ">
                    Ficha dual
                </h5> 
                <select class="form-select w-25" aria-label="select">
                <option selected>Semana</option>
                <option value="1">01/09/2022-07/09/2022</option>
                <option value="2">01/09/2022-07/09/2022</option>
                <option value="3">01/09/2022-07/09/2022</option>
                <option value="3">01/09/2022-07/09/2022</option>
            </select>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Indicador</th>
                                <th>Valoraci&oacute;n</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Esfuerzo y regularidad</td>
                                <td>Suficiente</td>
                                <td> </td>

                            </tr>
                            <tr class="table">
                                <td>Orden, estructura y presentación</td>
                                <td>Suficiente</td>
                                <td> </td>
                            </tr>
                            <tr class="table">
                                <td>Contenido</td>
                                <td>Suficiente</td>
                                <td> </td>
                            </tr>
                            <tr class="table">
                                <td>Terminolog&iacute;a y notaci&oacute;n</td>
                                <td>Suficiente</td>
                                <td> </td>
                            </tr>
                            <tr class="table">
                                <td>Calidad en el trabajo</td>
                                <td>Suficiente</td>
                                <td> </td>
                            </tr>
                            <tr class="table">
                                <td>Relaciona conceptos</td>
                                <td>Suficiente</td>
                                <td> </td>
                            </tr>
                            <tr class="table">
                                <td>Reflexi&oacute;n sobre el aprendizaje</td>
                                <td>Suficiente</td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer ">
                    <p></p>
                </div>
            </div>
        </div>
    </div>


</div>
@endsection