@extends('layouts.headerfooter')
@section('content')


<div class="row p-4 mb-4" id="datosPersonales"> <!--Este row contiene la foto y los datos personales-->
    <div class="d-none d-md-block col-md-4" id="foto">
        <img class="img-fluid" alt="foto estudiante" src="{{ asset('images/campusVitoria.jpg') }}" />
    </div>
    <div class="col-md-7 p-4 ms-5" id="formularioDP">
        <form action="" method="post" class="row gx-2 gy-2">
            <!-- Formulario para editar los datos personales del alumno -->
            <div class="col-12 d-flex mb-3">
                <h5>Datos personales</h5><button type="button" class="ms-5 align-center btn bg-primary btn-sm ms-2">Editar </button>
            </div>
            <div class="col-md-6">
                <input type="text" class="form-control " id="nombreE" placeholder="Nombre y Apellido" value="Iker Gomez" disabled>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control " id="dni" placeholder="Dni" value="12345678A" disabled>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control " id="telefono" placeholder="Telefono" value="666777888" disabled>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control " id="email" placeholder="Email" value="iker.gomez@deusto.com" disabled>
            </div>

            <div class="col-md-6 ">
                <input type="text" class="form-control " id="direccion" placeholder="Direccion" value="avda Principal 5, 6ºA Vitoria" disabled>
            </div>

            <div class="col-md-6 ">
                <input type="text" class="form-control " id="curso" placeholder="Curso" value="1º grado en industria digital" disabled>
            </div>
            <div class="col-4 offset-8">
                <button type="submit" class="ms-5 align-center btn bg-primary btn-sm ms-2">Guardar cambios </button>
            </div>

        </form>
    </div>
</div>
<!-- Seleccionar año y semana para ver diario o reunion -->
<div class="row mb-4 mt-4">
    <div class="col-md-3">
        <select class="form-select" aria-label="select">
            <option selected>Año academico</option>
            <option value="1">2022</option>
            <option value="2">2021</option>
            <option value="3">2020</option>
        </select>
    </div>
    <div class="col-md-3">
        <select class="form-select" aria-label="select">
            <option selected>Semana</option>
            <option value="1">12/09/2022</option>
            <option value="2">19/09/2022</option>
            <option value="3">26/09/2022</option>
        </select>
    </div>
    <div class="col-2">
        <button type="button" class="ms-5 align-center btn bg-primary btn-sm ms-2">Ver diario </button>
    </div>
    <div class="col">
        <button type="button" class="ms-5 align-center btn bg-primary btn-sm ms-2">Ver reuniones </button>
    </div>
</div>

<form class="row  p-4 mt-4" action="" method="post">
    <!-- Estos datos solo se pueden modificar si es el año actual -->
    <div class="col-3 d-flex mb-3">
        <h5>Ficha dual</h5><button type="button" class="ms-5 align-center btn bg-primary btn-sm ms-2">Editar </button>
    </div>
    <div class="w-100"></div>

    <div class="col-md-4">
        <label class="ms-2" for="tutorAcademico">Tutor acad&eacute;mico</label>
        <input class="form-control mt-2" type="text" value="Ivan Lopez Garcia">

        <label class="ms-2" for="emailTA">Contacto</label>
        <input class="form-control mt-2" id="emailTA" type="text" value="ivan.lopezgarcia@gmail.com" disabled>
    </div>

    <div class="col-md-4 ms-md-5">
        <label class="ms-2" for="empresa">Empresa</label>
        <input type="text" class="form-control " id="empresa" placeholder="Empresa" value="Mercedes" disabled>

        <label class="ms-2" for="tutorEmpresa">Tutor de la empresa</label>
        <input type="text" class="form-control " id="tutorEmpresa" placeholder="Tutor empresa" value="Juan Fernandez" disabled>

        <label class="ms-2" for="emailEmpresa">Contacto</label>
        <input type="text" class="form-control " id="emailEmpresa" placeholder="Email tutor empresa" value="juan.fernandez@deusto.com" disabled>

    </div>
    <div class="col-3 justify-content-center divFoto">
        <img class="img-fluid d-none d-md-block" alt="foto estudiante" src="{{ asset('images/fondoForm.png') }}" />
    </div>

</form>
<!--FIN FICHA DUAL-->

<!-- DIARIO DEL ALUMNO -->
<div class="row mt-4  p-4">
    <div class="col-md-3 d-flex mb-3">
        <h5>Diario del alumno</h5>
    </div>

    <div class="col-12">
        <div class="row justify-content-center mt-5"> <!-- Para que pueda escribir el tutor y el alumno -->
            <form action="" method="post" class="col">
                <div class="table-responsive">
                    <table class="table table-ligth align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Criterio</th>
                                <th scope="col">Comentario <button type="submit" class="ms-5 align-center btn bg-primary btn-sm ms-2">Editar </button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">
                                    Actividades desarrolladas
                                </th>
                                <td width="70%">
                                    <div class="mb-3">
                                        <label for="" class="form-label "></label>
                                        <textarea class="form-control bg-default" name="" id="" rows="3"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Reflexi&oacute;n sobre el aprendizaje</th>
                                <td width="70%">
                                    <div class="mb-3">
                                        <label for="" class="form-label "></label>
                                        <textarea class="form-control bg-default" name="" id="" rows="3"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Problemas, dificultades, mejora</th>
                                <td width="70%">
                                    <div class="mb-3">
                                        <label for="" class="form-label "></label>
                                        <textarea class="form-control bg-default" name="" id="" rows="3"></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Comentarios del tutor</th>
                                <td width="70%">
                                    <div class="mb-3">
                                        <label for="" class="form-label "></label>
                                        <textarea class="form-control bg-default" name="" id="" rows="3"></textarea>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
        </form>
    </div>
</div>
<!-- Division para mostrar reuniones -->
<div class="row mt-4  p-4">



</div>


@endsection