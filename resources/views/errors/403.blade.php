@extends('layouts.headerfooter')
@section('content')

<div class="d-flex justify-content-center">
<div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Acceso denegado</h5>
            <img src="https://media.tenor.com/ND052ZXrFxYAAAAd/messi-angry-messi-qatar-worldcup.gif" class="mb-3" alt="" width="75%" height="75%" srcset="">
            <br>
            <a href="{{ route('inicio.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

</div>
@endsection
