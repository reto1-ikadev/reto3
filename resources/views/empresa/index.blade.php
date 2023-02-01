@extends('layouts.headerfooter')
@section('content')

<!--CARROUSEL o TABLAS-->

<div class="row justify-content-center mt-5">
    <div class="col-10">
        <h2>Empresas</h2>
        <form id="filtrsoEmpresas" action="" method="get">
            
                <div class="row mb-5" id="filtrosEmp">
                        <div class="col-3">
                            <select class="form-select" aria-label="select" id="nombre" name="nombre">
                                
                            </select>
                        </div>
                        <div class="col-3">
                            <select class="form-select" aria-label="select" id="sector" name="sector">
                                
                            </select>
                        </div>
                        <div class="col-2">
                            <button type="submit" id="btn" class="btn btn-primary">Filtrar</button>
                            <input type="hidden" name="tipo" id="tipo" value="filtros_estudiante">
                        </div>
                    </div>
        </form>
        @foreach($empresas as $empresa)
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne{{$empresa -> id}}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{$empresa -> id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                        {{$empresa -> nombre}}
                    </button>
                </h2>
                <div id="flush-collapseOne{{$empresa -> id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{$empresa -> id}}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div><b>Sector:</b> {{$empresa -> sector}}</div>
                        <div> <b> Email de la persona de contacto:</b> {{$empresa -> email_contacto}} </div>
                        <div> <b> CIF:</b> {{$empresa -> cif}} </div>
                        <div> <b> Direccion:</b> {{$empresa -> direccion}}</div>    
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection