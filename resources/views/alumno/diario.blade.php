<div class="row mt-4">
    <input type="hidden" id="id_alumno" @can('alumno')value="{{auth()->user()->id}}"@endcan @can('tutores') value="{{$estudiante->id}}"@endcan />
    <div class="col">
        <h5>Entradas del diario</h5>
    </div>
    <div class="row"> <!-- FILTROS DIARIO-->
        <div class="col-3">
            <select id="filtroAnio" class="form-select" aria-label="select">
                <option value="no" selected>Filtrar por año</option>
            </select>
        </div>
        <div class="col-3">
            <select id="filtroSemana" class="form-select" aria-label="select">
                <option value="no" selected>Filtrar por semana</option>
            </select>
        </div>
        <div class="col">
            <button id="filtrar" type="button" class="btn btn-primary">Filtrar</button>
            <button id="reset" type="button" class="btn btn-primary">Reset</button>
        </div>
    </div><!--FIN FILTROS-->

    <div class="row mt-4">
        <div class="col">
            <div class="table-responsive">
                <table id="tabla" class="table">
                    <thead>
                    <tr>
                        <th scope="col">Semana</th>
                        <th scope="col">Actividades Realizadas</th>
                        <th scope="col">Actividades Comentario</th>
                        <th scope="col">Aprendizaje</th>
                        <th scope="col">Aprendizaje Comentario</th>
                        <th scope="col">Problemas</th>
                        <th scope="col">Problemas Comentario</th>
                    </tr>
                    </thead>
                    <tbody id="listaDiarios">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


