<div class="row gy-5" id="datosPersonales"> <!--Este row contiene la foto y los datos personales-->
    <h2>Ficha del Estudiante</h2>
    <div class="row d-flex flex-column fle mb-3">
        <div class="col mb-3">
            <a href="{{ route('historial.show',$estudiante) }}"><button class="btn btn-primary">Ver Historial</button></a>
        </div>
    </div>

    <div class="col" id="formularioDP">
        <!-- ALUMNO-->
        <form action="{{ route('estudiantes.update', $estudiante) }}" method="post" class="row ">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-2 d-flex d-none d-xl-block">
                    <img class="img-fluid" alt="foto estudiante" src="{{ asset('images/campusVitoria.jpg') }}" />
                </div>

                <div class="col-10 col-md-12 col-lg-10">

                        <div class="col-3 d-flex justify-content-between">
                        <h5>Datos personales</h5>
                            @can('coordinador')
                                <button id='editar' class="btn bg-primary btn-sm">Editar </button>
                            @endcan
                    </div>

                    <div class="row gy-3 mt-1">

                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="nombre" id="nombre" placeholder="Nombre" value="{{$estudiante->nombre}}" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="apellido" id="apellido" placeholder="Apellido" value="{{$estudiante->apellidos}}" disabled>
                        </div>

                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="dni" id="dni" placeholder="Dni" value="{{$estudiante->dni}}" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="telefono" id="telefono" placeholder="Telefono" value="{{$estudiante->telefono}}" disabled>
                        </div>

                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="email" id="email" placeholder="Email" value="{{$estudiante->user->email}}" disabled>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <input type="text" class="form-control editable" id="direccion" name="direccion" placeholder="Direccion" value="{{$estudiante->opcion_tipo->direccion}}" disabled>
                        </div>



                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="curso" id="curso" placeholder="Curso" value="{{$estudiante->opcion_tipo->curso->nombre}}" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="grado" id="grado" placeholder="Grado" value="{{ $estudiante->opcion_tipo->curso->grado->nombre}}" disabled>
                        </div>

                        <div id='combos'></div>
                        <div class="col-4 offset-8" id="botones">

                        </div>
                    </div>
                </div>
                <div class="col">

                </div>
</div>

        </form>
        <div class="row mb-5 d-flex justify-content-center align-items-center">
            <div class="col-6 col-md-6 d-flex flex-column">
                <div class="col-12 d-flex mb-3">
                    <!-- TUTOR ACADEMICO -->
                    <h5 id = "cambiarTA">Tutor universitario</h5>
                </div>
                <div id="TA">

                </div>
                <div class="col">
                    <label for="nombre"><b>Nombre:</b> </label> <span>{{$tutorA->nombre}}</span>
                </div>
                <div class="col">
                    <label for="apellidos"><b>Apellidos:</b> </label> <span>{{$tutorA->apellidos}}</span>
                </div>
                <div class="col">
                    <label for="email"><b>Email:</b></label> <span>{{$tutorA->user->email}}</span>
                </div>
            </div>
            <!-- TUTOR EMPRESA -->
            <div class="col-6 col-md-6 d-flex flex-column">
                <div class="col-12 d-flex mb-3">
                    <h5 id="cambiarTE">Tutor empresa</h5>
                </div>
                <div id="TE">

                </div>
                <div class="col">
                    <label for="nombre"><b>Nombre:</b></label><span>{{$tutorE->nombre}}</span>
                </div>
                <div class="col">
                    <label for="apellidos"><b>Apellidos:</b></label><span>{{$tutorE->apellidos}}</span>
                </div>
                <div class="col">
                    <label for="email"><b>Email:</b></label><span>{{$tutorE->user->email}}</span>
                </div>
                <div class="col">
                    <label for="empresa"><b>Empresa:</b></label><span>{{$tutorE->opcion_tipo->empresa->nombre}}</span>
                </div>
            </div>
        </div>
    </div>
@vite(['resources/js/cambiarTutores.js'])
