@extends('layouts.headerfooter')
@section('content')
<div class="row mt-5">
    <div class="col mb-3">
        <h2>Detalles de la reuni&oacute;n</h2>
    </div>
    <p>{{$array[0]}} y {{$fecha}} y {{$textArea}} y {{$aspectos}}</p>
@endsection