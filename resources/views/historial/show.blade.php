@extends('layouts.headerfooter')
@section('content')

<h1>HISTORIAL</h1>
    @php
        echo($historial);
    @endphp
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Alumno</th>
                <th scope="col">Tutor academico</th>
                <th scope="col">Tutor empresa</th>
                <th scope="col">Curso</th>
                <th scope="col">Año acad&eacute;mico</th>
                <th scope="col">Curso</th>
                <th scope="col">Año</th>
                <th scope="col">Nota del diario</th>
                <th scope="col">Nota de empresa</th>
                <th scope="col">Nota media</th>

            </tr>
        </thead>
        <tbody>
            @foreach($historial as $fila)
                <tr class="">

                    <td scope="row">{{ $fila->alumnos->persona->nombre }} {{ $fila->alumnos->persona->apellidos }}</td>
                    <td>{{ $fila->tutores_academicos->persona->nombre }} {{ $fila->tutores_academicos->persona->apellidos }}</td>
                    <td>{{ $fila->tutores_empresas->persona->nombre }} {{ $fila->tutores_empresas->persona->apellidos }}</td>
                    <td>{{ $fila->curso->nombre }}</td>
                    <td>{{ $fila->anos_academicos-> }}</td>
                    <td>R1C2</td>
                    <td>R1C3</td>
                    <td>R1C2</td>
                    <td>R1C3</td>
                    <td>R1C2</td>

                </tr>
            @endforeach
            <tr class="">
                <td scope="row">Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
        </tbody>
    </table>
</div>



@endsection
