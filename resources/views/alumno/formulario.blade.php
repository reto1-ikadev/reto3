<div class="row" id="datosPersonales"> <!--Este row contiene la foto y los datos personales-->
    <h1 class="mb-4">FICHA DUAL</h1>

    <div class="col" id="formularioDP">
        <!-- ALUMNO-->
        <form action="{{ route('estudiantes.update', $estudiante) }}" method="post" class="row ">
            @csrf
            @method('PUT')
            <div class="row col-12 mb-5">
                <div class="col-4 d-none d-md-block">
                    <img class="img-fluid" alt="foto estudiante" src="{{ asset('images/campusVitoria.jpg') }}" width="80%" height="80%" />
                </div>

                <div class="col ">
                    <div class="row">
                        <div class="col d-flex ">
                            <h5>Datos personales</h5><span id='editar' class="material-symbols-outlined">edit_square</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="nombre" id="nombre" placeholder="Nombre" value="{{$estudiante->nombre}}" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="apellido" id="apellido" placeholder="Apellido" value="{{$estudiante->apellidos}}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="dni" id="dni" placeholder="Dni" value="{{$estudiante->dni}}" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="telefono" id="telefono" placeholder="Telefono" value="{{$estudiante->telefono}}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="email" id="email" placeholder="Email" value="{{$estudiante->user->email}}" disabled>
                        </div>
                        <div class="col-12 col-md-6 ">
                            <input type="text" class="form-control editable" id="direccion" name="direccion" placeholder="Direccion" value="{{$estudiante->opcion_tipo->direccion}}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="curso" id="curso" placeholder="Curso" value="{{$estudiante->opcion_tipo->curso->nombre}}" disabled>
                        </div>
                        <div class="col-12 col-md-6">
                            <input type="text" class="form-control editable" name="grado" id="grado" placeholder="Grado" value="{{ $estudiante->opcion_tipo->curso->grado->nombre}}" disabled>
                        </div>
                    </div>
                    <div id= 'combos'></div>
                    <div class="col-4 offset-8" id="botones">

                </div>
                </div>
            </div>

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

        </form>
    </div>

</div>
@vite(['resources/js/cambiarTutores.js'])
