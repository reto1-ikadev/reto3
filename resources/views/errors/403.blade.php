@extends('layouts.headerfooter')
@section('content')

<div class="d-flex justify-content-center">
<div class="card text-center">
        <div class="card-body">
            <h5 class="card-title">Acceso denegado</h5>
            <img src="https://www.latercera.com/resizer/Sh_QUBbHa6-JMTTDy1LeQZmgCwA=/800x0/smart/cloudfront-us-east-1.images.arcpublishing.com/copesa/4UGXVOZ2LRG4HNNIYLNNO24MKM.gif" class="mb-3" alt="" width="75%" height="75%" srcset="">
            <br>
            <a href="{{ route('inicio.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>

</div>
@endsection
