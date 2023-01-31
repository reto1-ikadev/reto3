<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
    @vite('resources/js/app.js')
    <style>
        /*Codigo necesario para poder hacer que el footer este abajo*/

        footer {
            position: relative;
            clear:both;
            padding-top:20px;
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
