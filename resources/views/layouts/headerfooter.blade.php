<!DOCTYPE html>
<html lang="en">


<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    @vite(['resources/js/estudiantes/estudianteCreate.js', 'resources/js/componentes/btnValidar.js','resources/js/componentes/btnValidarEmpresa.js' , 'resources/js/formularios/llenarCombos.js', 'resources/sass/app.scss'])
    <style>
.material-symbols-outlined {
  font-variation-settings:
  'FILL' 0,
  'wght' 300,
  'GRAD' 0,
  'opsz' 48
}
</style>

</head>


<body class="min-vh-100 d-flex flex-column">
@include('nav')
        <div class="contenido">

        @yield('content')
        </div>
                <footer class="footer mt-auto text-center" style="background-color: #f1f1f1;">
                    <!-- Grid container -->
                    <div class="container-fluid pt-4">
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




                            <!-- Github -->
                            <a class="redes btn-link btn-floating btn-lg text-dark m-1" href="https://github.com/deusto-ess" role="button" data-mdb-ripple-color="dark"><img class="img-fluid" src="{{ asset('images/git.png') }}" alt="github"></a>


                        </section>
                        <!-- Section: Social media -->
                    </div>


                    <!-- Copyright -->
                    <div class="text-center text-dark p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                        © 2020 Copyright:
                        <a class="text-dark" href="https://mdbootstrap.com/">Universidad de Deusto | University of Deusto</a>
                    </div>
                    <!-- Copyright -->
                </footer>
            </div>

        <script type="text/javascript">
            window.CSRF_TOKEN = '{{csrf_token()}}';
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>


</html>
