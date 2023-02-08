<h5>Bolet&iacute;n</h5>
<div class="table-responsive">
    <table class="table table-primary">
        <thead>
            <tr>
                <th scope="col">Año academico</th>
                <th scope="col">Curso</th>
                <th scope="col">Nota del diario</th>
                <th scope="col">Nota de la empresa</th>
                <th scope="col">Nota media</th>
            </tr>
        </thead>
        <tbody>
            <tr class="">
                @foreach($historial as $fila)
                @php
                $inicio = $fila->anos_academicos->fecha_inicio;
                $final = $fila->anos_academicos->fecha_fin;
                $fechaFinEntera = strtotime($final);
                $fechaInicioEntera = strtotime($inicio);
                $anyoFin = date('Y',$fechaFinEntera);
                $anyoInicio = date('Y',$fechaInicioEntera);
                $nombre = $anyoInicio .'-'. $anyoFin;

                @endphp
                @if($fila->anos_academicos->nombre == $nombre)
                    <td scope="row">{{ $fila->anos_academicos->nombre }} </td>
                    <td>{{ $fila->curso->nombre }}</td>
                    <td>{{ $fila->evaluacion_diario->nota_final }}</td>
                    <td>{{ $fila->evaluacion_empresa->nota_final}}</td>
                    <td>{{ ($fila->evaluacion_empresa->nota_final + $fila->evaluacion_diario->nota_final )/2 }}</td>

                @endif

                @endforeach

                
               
            </tr>
        </tbody>
    </table>
</div>

