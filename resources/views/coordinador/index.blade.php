@extends('layouts.headerfooter')
@section('content')

        <!--CARROUSEL o TABLAS-->

        <div class="row justify-content-center mt-4">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                @else
                @switch($tipo)
                @case('estudiante')
                <table class="table mt-2">
                    <tr>
                        <td>Nombre</td>
                    </tr>
                    @foreach($estudiantes as $estudiante)
                    <tr>
                        <td><a href="{{ route('estudiantes.show', $estudiante) }}"> {{$estudiante}}</a></td>
                    </tr>
                    @endforeach
                </table>
                @break
                @case('empresa')
                @foreach($empresas as $empresa)
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id = "flush-headingOne{{$empresa}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$empresa}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                    {{$empresa}}
                                </button>
                            </h2>
                            <div id="flush-collapseOne{{$empresa}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{$empresa}}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Aqu&iacute; se muestran los datos de la empresa</div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @break
                @case('tutoresAcademicos')
                @foreach($tutoresAcademicos as $tutorAcademico)
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id = "flush-headingOne{{$tutorAcademico}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$tutorAcademico}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                    {{$tutorAcademico}}
                                </button>
                            </h2>
                            <div id="flush-collapseOne{{$tutorAcademico}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{$tutorAcademico}}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Aqu&iacute; se muestran los datos de la empresa</div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @break
                @case('tutoresEmpresa')
                @foreach($tutoresEmpresa as $tutorEmpresa)
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id = "flush-headingOne{{$tutorEmpresa}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$tutorEmpresa}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                    {{$tutorEmpresa}}
                                </button>
                            </h2>
                            <div id="flush-collapseOne{{$tutorEmpresa}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{$tutorEmpresa}}" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Aqu&iacute; se muestran los datos de la empresa</div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @break
                @endswitch
                @endif
            </div>
        </div>


        <div class="row">
            <div class="col">
                <footer class="text-center text-white" style="background-color: #f1f1f1;">
                    <!-- Grid container -->
                    <div class="container pt-4">
                        <!-- Section: Social media -->
                        <section class="mb-4">
                            <!-- Facebook -->
                            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">Facebook</a>

                            <!-- Twitter -->
                            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">Twitter</a>

                            <!-- Google -->
                            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">Google</a>

                            <!-- Instagram -->
                            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">Instagram</a>

                            <!-- Linkedin -->
                            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">Linkedin</a>
                            <!-- Github -->
                            <a class="btn btn-link btn-floating btn-lg text-dark m-1" href="#!" role="button" data-mdb-ripple-color="dark">Github</a>
                        </section>
                        <!-- Section: Social media -->
                    </div>
                    <!-- Grid container -->

                    <!-- Copyright -->
                    <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">

                        <a class="text-dark" href="https://deusto.com/">Deusto</a>
                    </div>
                    <!-- Copyright -->
                </footer>
            </div>
        </div>





    </div>

        
@endsection