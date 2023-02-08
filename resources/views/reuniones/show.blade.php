@extends('layouts.headerfooter')
@section('content')
<div class="row mt-5">
    <div class="col mb-3">
        <h2>Detalles de la reuni&oacute;n</h2>
    </div>
    <!--<div class="col">
        <button type="button" class="btn btn-primary">Habilitar edici&oacute;n</button>
    </div>-->
    <div class="table-responsive">
        <form action="/crear_reunion" method="post">
            @csrf
            <table class="table" style="list-style: none;">
                <tr>
                    <th>Fecha</th>
                    <td>{{ $fecha }}</th>
                </tr>

                <tr class="">
                    <th>Correo de los asistentes</th>
                    <td>
                        <ul id="lista">
                            <li><input name="asistente1" type="email" class="form-control" placeholder="Convocador" value="{{auth()->user()->email}}" required></li>
                            <!--<li><input type="text" class="form-control" value="Asistente" disabled></li>
                            <li><input type="text" class="form-control" value="Asistente" disabled></li>-->
                        </ul>
                        <div class="d-inline-flex p-2">
                            <button style="margin: 20px;" type="button" class="btn btn-primary" name="aniadirAsistente" value="aniadirAsistente" id="aniadirAsistente">Añadir Asistente</button>
                            <button style="margin: 20px;" type="button" class="btn btn-primary" name="quitarAsistente" value="quitarAsistente" id="quitarAsistente">Quitar Asistente</button>
                        </div>    
                    </td>
                </tr>
                <tr class="">
                    <th>Tipo</th>
                    <td>
                        <select class="form-select" id="selectTipoReunion" name="selectTipoReunion">
                            <option default value="presencial">Presencial</option>
                            <option value="llamada">Llamada</option>
                        </select>
                    </td>
                </tr>
                <tr class="">
                    <th>Objetivos</th>
                    <td>
                        <!--<li><input type="text" class="form-control" placeholder="Comentario"></li>
                        <li><input type="text" class="form-control" value="Comentario" disabled></li>
                        <li><input type="text" class="form-control" value="Comentario" disabled></li>-->
                        <li><div class="form-group">
                            <textarea class="form-control" name="textArea" rows="3" required></textarea>
                        </div></li>
                    </td>
                </tr>
                <tr class="">
                    <th>Aspectos comentados</th>
                    <td>
                        <li><input type="text" class="form-control" name="aspectos" placeholder="Aspectos" required></li>
                        <!--<li><input type="text" class="form-control" value="Asistente" disabled></li>
                        <li><input type="text" class="form-control" value="Asistente" disabled></li>-->
                    </td>
                </tr>
            </table>
            <div class="col">
                <button class="btn mb-5" type="submit">Guardar cambios</button>
            </div>
        </form>
    </div>
    @vite(['resources/js/reuniones_script.js'])
@endsection