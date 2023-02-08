@extends('layouts.headerfooter')
@section('content')
    <style>
        #statistics-circle {
            width: 300px;
            height: 300px;
            text-align: center;
        }

        .circle-background {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: solid 10px #ddd;
            box-sizing: border-box;
            position: relative;
        }

        .circle-foreground {
            background-color: #4caf50;
            border-radius: 50%;
            position: absolute;
            top: 10px;
            left: 10px;
            bottom: 10px;
            right: 10px;
        }

        .percentage {
            position: absolute;
            font-size: 36px;
            font-weight: bold;
            transform: translate(-50%, -50%);
        }

        .percentage:nth-of-type(1) {
            top: 25%;
            left: 50%;
        }

        .percentage:nth-of-type(2) {
            top: 50%;
            left: 75%;
        }

        .percentage:nth-of-type(3) {
            top: 75%;
            left: 50%;
        }
    </style>
    <div class="col d-flex justify-content-center">
        <h1 class="mb-3">Estadisticas del grado {{$grado->nombre}} </h1></div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Curso</th>
                                    <th>Nota</th>
                                </tr>
                                </thead>
                                <tbody>
                                     <tr>
                                         <td>Aprobados: {{$aprobados}}</td>
                                         <td>Suspensos: {{$suspensos}}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
