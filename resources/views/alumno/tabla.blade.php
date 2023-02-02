<h5>Informacion del Tutor Academico</h5>
<table class="table table-striped mb-3">
    <tr>
        <th scope="row">Email</th>
        <th scope="row">Telefono</th>
    </tr>
    <tr>
        <td>{{$tutor_academico->user->email}}</td>
        <td>{{$tutor_academico->telefono }}</td>
    </tr>
</table>
<h5>Informacion del Tutor Empresa</h5>
<table class="table table-striped">
    <tr>
        <th scope="row">Email</th>
        <th scope="row">Telefono</th>
    </tr>
    <tr>
        <td>{{$tutor_empresa->user->email}}</td>
        <td>{{$tutor_empresa->telefono }}</td>
    </tr>
</table>
