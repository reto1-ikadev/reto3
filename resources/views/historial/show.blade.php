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
                    <td scope="row">{{ $fila->tutores_academicos(->telefono_academico }}</td>
                    <td>R1C2</td>
                    <td>R1C3</td>
                    <td>R1C2</td>
                    <td>R1C3</td>
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