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
        
    </style>
</head>

<body>
    <div class="container-fluid"> 
        <div class="row">
            <div class="col">
                <nav class="navbar"><!-- Menu lateral -->
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
                                        
                                        <li><a class="dropdown-item" href="{{ route('tutoresAcademicos.create') }}">Tutor acad&eacute;mico/Coordinador</a></li>
                                        <li><a class="dropdown-item" href="{{ route('tutoresEmpresa.create') }}">Tutor de empresa</a></li>
                                        <li><a class="dropdown-item" href="{{ route('estudiantes.create') }}">Estudiantes</a></li>
                                        <li><a class="dropdown-item" href="{{ route('empresas.create') }}">Empresa</a></li>
                                    </ul>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#">Estad&iacute;sticas</a>
                                </li>
                                <li class="nav-item debajo">
                                    
                                    <hr class="bg-danger border-2 border-top border-primary">  
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
    
        @yield('content')

        <div class="row">
            <div class="col">
            <footer class="text-center text-white" style="background-color: #f1f1f1;">
                    <!-- Grid container -->
                    <div class="container pt-4">
                        <!-- Section: Social media -->
                        <section class="mb-4">
                            <!-- Facebook -->
                            <a class="redes btn-link btn-floating btn-lg text-dark m-1" href="https://es-es.facebook.com/UDeusto/" role="button" data-mdb-ripple-color="dark"><img class="img-fluid" src="{{ asset('images/facebook.png') }}" alt="facebook"></a>

                            <!-- Twitter -->
                            <a class="redes btn-link btn-floating btn-lg text-dark m-1" href="https://twitter.com/deusto" role="button" data-mdb-ripple-color="dark"><img class="img-fluid" src="{{ asset('images/twitter.png') }}" alt="twitter"></a>

                            <!-- Google -->
                            <a class="redes btn-link btn-floating btn-lg text-dark m-1" href="https://www.google.es/" role="button" data-mdb-ripple-color="dark"><img class="img-fluid" src="{{ asset('images/google.png') }}" alt="google"></a>

                            <!-- Instagram -->
                            <a class="redes btn-link btn-floating btn-lg text-dark m-1" href="https://www.instagram.com/udeusto" role="button" data-mdb-ripple-color="dark"><img class="img-fluid" src="{{ asset('images/insta.png') }}" alt="instagram"></a>

                            <!-- Linkedin -->
                            <a class="redes btn-link btn-floating btn-lg text-dark m-1" href="https://es.linkedin.com/school/deusto/" role="button" data-mdb-ripple-color="dark"><img class="img-fluid" src="{{ asset('images/linkedin.png') }}" alt="linkedin"></a>
                            <!-- Github -->
                            <a class="redes btn-link btn-floating btn-lg text-dark m-1" href="https://github.com/deusto-ess" role="button" data-mdb-ripple-color="dark"><img class="img-fluid" src="{{ asset('images/git.png') }}" alt="github"></a>
                        </section>
                        <!-- Section: Social media -->
                    </div>
                    <!-- Grid container -->

                    <!-- Copyright -->
                    <div class="foot text-center text-dark p-3" >
                        <a class="text-dark" href="https://deusto.com/">Universidad de Deusto | University of Deusto</a>
                    </div>
                    <!-- Copyright -->
                </footer>
            </div>
        </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>