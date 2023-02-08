@extends('layouts.headerfooter')
@section('content')
    <div class="col d-flex mx-auto  flex-column justify-content-center">
        <div class="row">
        <h1 class="mb-3">Estadisticas del grado {{$grado->nombre}} </h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-body ">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="row">Aprobados</th>
                                        <th scope="row">Suspensos</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{$aprobados}}</td>
                                    <td>{{$suspensos}}</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
