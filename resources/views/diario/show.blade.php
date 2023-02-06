<!-- DIARIO DEL ALUMNO -->
<div class="row mt-4  p-4">
    <p>{{$id}}</p>
    <div class="col-md-5 d-flex mb-3">
        <h2>Diario del alumno</h2>
    </div>
    <!-- No se para que sirve este boton
    <div class="col">
        <button type="button" class="btn btn-primary">Habilitar edici&oacute;n</button>
    </div>-->
    <div class="col-12">
        <div class="row justify-content-center mt-5"> <!-- Para que pueda escribir el tutor y el alumno -->
            <form action="/diarioGuardar" method="post" class="col">
                @csrf
                <div class="table-responsive">
                    <table class="table table-ligth align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Criterio</th>
                                <th scope="col">Comentarios </th>
                                <th scope="col">Correcci&oacute;n</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    Actividades desarrolladas
                                </th>
                                <td width="40%">
                                    <div class="mb-3">
                                        <label for="actDesCor" class="form-label ">Actividades Corrección: </label>
                                        <textarea @can('tutor_academico') disabled @endcan class="form-control bg-default" name="actDesCor" id="actDesCor" rows="3"></textarea>
                                    </div>
                                </td>
                                <td width="40%">
                                    <div class="mb-3">
                                        <label for="actDesCom" class="form-label ">Actividades Comentarios: </label>
                                        <textarea @can('alumno') disabled @endcan class="form-control bg-default" name="actDesCom" id="actDesCom" rows="3"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Reflexi&oacute;n sobre el aprendizaje</th>
                                <td width="40%">
                                    <div class="mb-3">
                                        <label for="apreCor" class="form-label ">Reflexiones Correciones</label>
                                        <textarea @can('tutor_academico') disabled @endcan class="form-control bg-default" name="apreCor" id="apreCor" rows="3"></textarea>
                                    </div>
                                </td>
                                <td width="40%">
                                    <div class="mb-3">
                                        <label for="apreCom" class="form-label ">Reflexiones Comentarios</label>
                                        <textarea @can('alumno') disabled @endcan class="form-control bg-default" name="apreCom" id="apreCom" rows="3"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Problemas, dificultades, mejora</th>
                                <td width="40%">
                                    <div class="mb-3">
                                        <label for="problemCor" class="form-label ">Problemas Correciones</label>
                                        <textarea @can('tutor_academico') disabled @endcan class="form-control bg-default" name="problemCor" id="problemCor" rows="3"></textarea>
                                    </div>
                                </td>
                                <td width="40%">
                                    <div class="mb-3">
                                        <label for="problemCom" class="form-label ">Problemas Comentarios</label>
                                        <textarea @can('alumno') disabled @endcan class="form-control bg-default" name="problemCom" id="problemCom" rows="3"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        <div class="col">
            <button class="btn mb-5" type="submit"> Guardar cambios</button>
        </div>
        </form>
    </div>
</div>
