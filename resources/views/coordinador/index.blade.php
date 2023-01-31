@extends('layouts.headerfooter')
@section('content')

    <!--CARROUSEL o TABLAS-->

        <div class="row justify-content-center mt-5">
            <div class="col-10">
                
                @if(!isset($estudiantes)&&!isset($empresas)&&!isset($tutoresAcademicos)&&!isset($tutoresEmpresa))
                <div id="carouselExampleFade" class="carousel slide carousel-fade">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/deusto3.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/campusVitoria.jpg') }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/deusto2.png') }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            @else
                <h2>{{$tipo}}</h2>
                <form id="filtrosEstudiantes" action="" method="get" >
                    <div class="row mb-5" id="filtrosEst">
                        <div class="col">
                            <select class="form-select" aria-label="select" name="grado">
                                <option value="0" selected>Filtrar por grado</option>
                                <option value="1">Primero</option>
                                <option value="2">Segundo</option>
                                <option value="3">Tercero</option>
                                <option value="3">Cuarto</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select" aria-label="select" name="curso">
                                <option value="0" selected>Filtrar por curso</option>
                                <option value="1">Primero</option>
                                <option value="2">Grado dos</option>
                                <option value="3">Grado tres</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-select" aria-label="select" name="empresa">
                                <option value="0" selected>Filtrar por empresa</option>
                                <option value="1">Empresa1</option>
                                <option value="2">Empresa2</option>
                                <option value="3">Empresa3</option>
                            </select>
                        </div>
                        <div class="col">
                            <input class="form-control" name="nombre" placeholder="Buscar por nombre">
                        </div>
                        <div class="col-2">
                            <button type="submit" id="btn" class="btn btn-primary">Filtrar</button>
                        </div>
                    </div>
                </form>
                @switch($tipo)
                    @case('estudiante')
                        <table class="table mt-2">
                            <thead>
                            <td>Nombre</td>
                            <td>Apellido</td>
                            <td>Grado</td>
                            <td>Curso</td>
                            <td>Empresa</td>
                            <td>Detalles</td>
                            </thead>
                            @foreach($estudiantes as $estudiante)
                                <tr>
                                    <td>{{$estudiante['nombre']}}</td>
                                    <td>{{$estudiante['apellidos']}}</td>
                                    <td>{{$estudiante['grado']}}</td>
                                    <td>{{$estudiante['curso']}}</td>
                                    <td>{{$estudiante['empresa']}}</td>
                                    <td><a href="{{ route('estudiantes.show', $estudiante) }}"> Ver</a></td>
                                </tr>
                            @endforeach
                        </table>
                        @break
                    @case('empresa')
                        @foreach($empresas as $empresa)
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne{{$empresa}}">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne{{$empresa}}" aria-expanded="false"
                                                aria-controls="flush-collapseOne">
                                            {{$empresa}}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne{{$empresa}}" class="accordion-collapse collapse"
                                         aria-labelledby="flush-headingOne{{$empresa}}"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Aqu&iacute; se muestran los datos de la empresa
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @break
                    @case('tutoresAcademicos')
                        @foreach($tutoresAcademicos as $tutorAcademico)
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne{{$tutorAcademico}}">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne{{$tutorAcademico}}"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                            {{$tutorAcademico}}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne{{$tutorAcademico}}" class="accordion-collapse collapse"
                                         aria-labelledby="flush-headingOne{{$tutorAcademico}}"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Aqu&iacute; se muestran los datos de la empresa
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @break
                    @case('tutoresEmpresa')
                        @foreach($tutoresEmpresa as $tutorEmpresa)
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne{{$tutorEmpresa}}">
                                        <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne{{$tutorEmpresa}}"
                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                            {{$tutorEmpresa}}
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne{{$tutorEmpresa}}" class="accordion-collapse collapse"
                                         aria-labelledby="flush-headingOne{{$tutorEmpresa}}"
                                         data-bs-parent="#accordionFlushExample">
                                        <div class="accordion-body">Aqu&iacute; se muestran los datos de la empresa
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @break
                @endswitch
            @endif
        </div>
    </div>
@endsection
