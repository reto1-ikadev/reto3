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

    @vite('resources/js/app.js')
    @vite(['resources/js/estudiantes/estudiantesCreate.js'])
    @vite(['resources/js/tutoresEmpresa/tutorEmpresaCreate.js'])
    @vite(['resources/js/tutoresEmpresa/tutoresAcademicosCreate.js'])
    @vite(['resources/js/componentes/btnValidar.js'])

    <style>
        /*Codigo necesario para poder hacer que el footer este abajo*/
        .divFoto{
            padding: 2em;
        }
        #datosPersonales{

            border-radius: 5px;
        }

        #formularioDP{
            border-radius: 5px;
        }

        footer {
            position: relative;
            clear:both;
            padding-top:20px;
        }


        input[type=text]:disabled{
            border:none;
            border-bottom: black 1px solid;
            background-color: white;
        }
        input[type=text]{
            border:none;
            border-bottom: black 1px solid;
            background-color: white;
        }


        /*Este codigo nos permite quitar espacios hechos por la clase row*/

        .row {
            margin-left: 0px;
            margin-right: 0px;
        }
    </style>
</head>

<body class="vh-100 d-flex flex-column">

@include('nav')
        @yield('content')

      @include('footer')

</body>

</html>
