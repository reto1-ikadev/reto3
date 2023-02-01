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
                                <a class="nav-link active" aria-current="page" href="{{ route('coordinador.index') }}">P&aacute;gina Principal</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('estudiantes.index') }}">Estudiantes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('empresas.index') }}">Empresas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('tutoresAcademicos.index') }}">Tutores acad&eacute;micos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('tutoresEmpresa.index') }}">Tutores de empresa</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <a class="nav-link active" href="#">Estad&iacute;sticas</a>
                            </li>
                            <li class="nav-item debajo">

                                <hr class="bg-danger border-2 border-top border-primary">
                                <a class="nav-link active" href="#">Cambiar modo</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="/logout">Salir</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
