<div class="row" id="datosPersonales"> <!--Este row contiene la foto y los datos personales-->
    <h2>FICHA DUAL</h2>

    <div class="col " id="formularioDP">
        <!-- ALUMNO-->
        <form action="{{ route('estudiantes.update', $estudiante) }}" method="post" class="row ">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-4 d-none d-md-block">
                    <img class="img-fluid" alt="foto estudiante" src="{{ asset('images/campusVitoria.jpg') }}" />
                </div>

                <div class="col col-xl-12">
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

            <div class="row">
                <div class="col-12 d-flex mb-3">
                    <!-- TUTOR ACADEMICO -->
                    <h5 id = "cambiarTA">Tutor universitario</h5>
                </div>
                <div id="TA">

                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nombreA" id="nombreA" placeholder="Nombre" value="{{$tutorA->nombre}}" disabled>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="apellidoA" id="apellidoA" placeholder="Apellido" value="{{$tutorA->apellidos}}"  disabled>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="emailA" id="emailA" placeholder="Email" value="{{$tutorA->user->email}}"  disabled>
                </div>
                <!-- TUTOR EMPRESA -->
                <div class="col-12 d-flex mb-3">
                    <h5 id="cambiarTE">Tutor empresa</h5>
                </div>
                <div id="TE">

                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="nombreE" id="nombreE" placeholder="Nombre" value="{{$tutorE->nombre}}"  disabled>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="apellidoE" id="apellidoE" placeholder="Apellido" value="{{$tutorE->apellidos}}"  disabled>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="emailE" id="emailE" placeholder="Email" value="{{$tutorE->user->email}}"  disabled>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="empresaE" id="empresaE" placeholder="Empresa" value="{{ $tutorE->opcion_tipo->empresa->nombre }}"  disabled>
                </div>
                
            </div>

        </form>


    </div>

</div>
@vite(['resources/js/cambiarTutores.js'])