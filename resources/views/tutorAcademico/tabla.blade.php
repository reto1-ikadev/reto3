<!-- RESUMEN DEL ALUMNO -->
<h5>Informacion de los Alumnos</h5>
<table class="table table-striped mb-3">
    <tr>
        <th scope="row">Nombre</th>
        <th scope="row">Email</th>
        <th scope="row">Telefono</th>
        <th scope="row">Empresa</th>
    </tr>
    @foreach ($alumnos as $alumno)
        <tr>
            <td>{{$alumno->persona->nombre}}</td>
            <td>{{$alumno->persona->user->email}}</td>
            <td>{{$alumno->persona->telefono }}</td>
            <td>{{$alumno->tutor_empresa->empresa->nombre}}</td>
        </tr>
@endforeach
</table>
