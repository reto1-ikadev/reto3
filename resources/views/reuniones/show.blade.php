@extends('layouts.headerfooter')
@section('content')
<div class="row mt-5">
    <div class="col mb-3">
        <h2>Detalles de la reuni&oacute;n</h2>
    </div>
    <div class="col">
        <button type="button" class="btn btn-primary">Habilitar edici&oacute;n</button>
    </div>
    <div class="table-responsive">
        <form action="" method="post">
            <table class="table">
                <tr>
                    <th>Fecha</th>
                    <td>22/09/2022</th>
                </tr>

                <tr class="">
                    <th>Asistentes</th>
                    <td>
                        <ul>
                            <li><input type="text" class="form-control " value="Asistente" disabled></li>
                            <li><input type="text" class="form-control " value="Asistente" disabled></li>
                            <li><input type="text" class="form-control " value="Asistente" disabled></li>
                        </ul>
                    </td>
                </tr>
                <tr class="">
                    <th>Tipo</th>
                    <td>
                        Presencial
                    </td>
                </tr>
                <tr class="">
                    <th>Objetivos</th>
                    <td>
                        <li><input type="text" class="form-control " value="Comentario" disabled></li>
                        <li><input type="text" class="form-control " value="Comentario" disabled></li>
                        <li><input type="text" class="form-control " value="Comentario" disabled></li>
                    </td>
                </tr>
                <tr class="">
                    <th>Aspectos comentados</th>
                    <td>
                        <li><input type="text" class="form-control " value="Asistente" disabled></li>
                        <li><input type="text" class="form-control " value="Asistente" disabled></li>
                        <li><input type="text" class="form-control " value="Asistente" disabled></li>
                    </td>
                </tr>
            </table>
            <div class="col">
                <button class="btn mb-5" type="submit"> Guardar cambios</button>
            </div>
        </form>
    </div>


    @endsection