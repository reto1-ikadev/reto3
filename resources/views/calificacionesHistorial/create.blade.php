@extends('layouts.headerfooter')
@section('content')

    <div class="row mb-4">
        <div class="col">
            <h5 class="mb-3">{{$estudiante->nombre}} {{ $estudiante->apellidos }}</h5>
            <p><b>Curso:</b> {{ $estudiante->opcion_tipo->curso->nombre }}</p>
            <p><b>Tutor de universidad:</b> {{ $tutorA->nombre }}</p>
            <p><b>Tutor de empresa:</b> {{ $tutorE->nombre }}</p>
            <p><b>Año academico:</b> {{ $anoAcademico->nombre }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form class="row justify-content-center" action="{{ route('calificacionesHistorial.store') }}" method="post">
                @csrf
                <input type="hidden" name="id_alumno" value="{{ $estudiante->id }}">
                <input type="hidden" name="id_tutor_academico" value="{{ $tutorA->id }}">
                <input type="hidden" name="id_tutor_empresa" value="{{ $tutorE->id }}">
                <input type="hidden" name="id_ano_academico" value="{{ $anoAcademico->id }}">
                <input type="hidden" name="id_curso" value="{{ $estudiante->opcion_tipo->curso->id }}">
                <div class="table-responsive col-8 mb-3">
                    <h4>Evaluaci&oacute;n del diario</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Indicador</th>
                            <th>Valoracion</th>
                            <th>Observaciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="">
                            <td>Esfuerzo y regularidad</td>
                            <td><select class="form-select" name="regularidad_nota" id="regularidad_nota">
                                    <option selected value="2">INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="regularidad_obs" id="regularidad_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Orden, estructura y presentacion</td>
                            <td><select class="form-select" name="orden_nota" id="orden_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="orden_obs" id="orden_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Contenido</td>
                            <td><select class="form-select" name="contenido_nota" id="contenido_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="contenido_obs" id="contenido_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Terminolog&iacute;a y notaci&oacute;n</td>
                            <td><select class="form-select" name="terminologia_nota" id="terminologia_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="terminologia_obs" id="terminologia_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Calidad en el trabajo</td>
                            <td><select class="form-select" name="calidad_nota" id="calidad_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="calidad_obs" id="calidad_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Relaciona conceptos</td>
                            <td><select class="form-select" name="conceptos_nota" id="conceptos_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="conceptos_obs" id="conceptos_obs" cols="30" rows="2"></textarea>
                        </tr>
                        <tr class="">
                            <td>Reflexi&oacute;n sobre el aprendizaje</td>
                            <td><select class="form-select" name="reflexion_nota" id="reflexion_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="reflexion_obs" id="reflexion_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr>

                            <td>Nota final</td>
                            <td><input type="text" name="nota_final" id="nota_final" value=""></td>
                            <td><span id='calcularDiario' class="material-symbols-outlined">calculate</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive col-8 mb-3">
                    <h4>Evaluaci&oacute;n del trabajo en empresa</h4>
                    <table class="table">
                        <thead>

                        <tr>
                            <th>Indicador</th>
                            <th>Valoracion</th>
                            <th>Observaciones</th>
                        </tr>

                        </thead>
                        <tbody>
                        <tr>
                            <th colspan="3">ASPECTOS ACTITUDINALES</th>
                        </tr>
                        <tr class="">
                            <td>Actitud y disposicion para el trabajo</td>
                            <td><select class="form-select" name="actitud_nota" id="actitud_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="actitud_obs" id="actitud_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Puntualidad</td>
                            <td><select class="form-select" name="puntualidad_nota" id="puntualidad_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="puntualidad_obs" id="puntualidad_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Responsabilidad</td>
                            <td><select class="form-select" name="responsabilidad_nota" id="responsabilidad_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="responsabilidad_obs" id="responsabilidad_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <th colspan="3">CAPACIDADES</th>
                        </tr>
                        <tr class="">
                            <td>Capacidad de resoluci&oacute;n de problemas</td>
                            <td><select class="form-select" name="resolucion_problemas_nota" id="resolucion_problemas_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="resolucion_problemas_obs" id="resolucion_problemas_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Calidad en el trabajo</td>
                            <td><select class="form-select" name="calidad_trabajos_nota" id="calidad_trabajos_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="calidad_trabajos_obs" id="calidad_trabajos_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Implicaci&oacute;n e integraci&oacute;n en el equipo</td>
                            <td><select class="form-select" name="implicacion_nota" id="implicacion_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="implicacion_obs" id="implicacion_obs" cols="30" rows="2"></textarea>
                        </tr>
                        <tr class="">
                            <td>Toma de decisiones</td>
                            <td><select class="form-select" name="decisiones_nota" id="decisiones_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="decisiones_obs" id="decisiones_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Capacidad de comunicaci&oacute;n oral y escrita</td>
                            <td><select class="form-select" name="comunicacion_nota" id="comunicacion_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="comunicacion_obs" id="comunicacion_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Capacidad de planificaci&oacute;n y organizaci&oacute;n</td>
                            <td><select class="form-select" name="planificacion_nota" id="planificacion_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="planificacion_obs" id="planificacion_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr class="">
                            <td>Capacidad de aprendizaje y asimilaci&oacute;n</td>
                            <td><select class="form-select" name="aprendizaje_nota" id="aprendizaje_nota">
                                    <option value="2"selected>INSUFICIENTE</option>
                                    <option value="5">SUFICIENTE</option>
                                    <option value="6">BIEN</option>
                                    <option value="8">NOTABLE</option>
                                    <option value="10">EXCELENTE</option>
                                </select></td>
                            <td><textarea class="form-control" name="aprendizaje_obs" id="aprendizaje_obs" cols="30" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>Nota final</td>
                            <td><input type="text" name="nota_final_empresa" id="nota_final_empresa" required readonly></td>
                            <td><span id='calcularEmpresa' class="material-symbols-outlined">calculate</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <input type="submit" class="btn" value="Enviar valoraciones">
                    </div>
                </div>

            </form>
        </div>


    </div>

    @vite(['resources/js/calcularMediaNotas.js'])
@endsection
