<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/dist/css/bootstrap.css') }}">
    <style>
        body {
            height: 100vh;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <nav class="navbar bg-primary "><!-- navegador -->
                    <img src="{{ asset('images/logo.svg') }}" id="logoCab" class="img-fluid h-20 w-25" alt="">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Men&uacute;</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('estudiantes.index') }}">Estudiantes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('empresas.index') }}">Empresas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tutoresAcademicos.index') }}">Tutores acad&eacute;micos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('tutoresEmpresa.index') }}">Tutores de empresa</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dar de alta
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Coordinador</a></li>
                                        <li><a class="dropdown-item" href="#">Tutor</a></li>
                                        <li><a class="dropdown-item" href="#">Tutor de empresa</a></li>
                                        <li><a class="dropdown-item" href="#">Alumnos</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Estad&iacute;sticas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Cambiar modo</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Salir</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!--CARROUSEL-->

        <div class="row justify-content-center">
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
                            @foreach($estudiantes as $estudiante)
                               <li><h1> <a href="{{ route('estudiantes.show', $estudiante) }}"> {{$estudiante}}</a></h1></li>
                            @endforeach
                            @break
                        @case('empresa')
                            @foreach($empresas as $empresa)
                                <h1> {{$empresa}}</h1>
                            @endforeach
                            @break
                        @case('tutoresAcademicos')
                            @foreach($tutoresAcademicos as $tutorAcademico)
                                <h1> {{$tutorAcademico}}</h1>
                            @endforeach
                            @break
                        @case('tutoresEmpresa')
                            @foreach($tutoresEmpresa as $tutorEmpresa)
                                <h1> {{$tutorEmpresa}}</h1>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>




</body>

</html>