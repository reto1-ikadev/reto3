var idAlumno = document.getElementById("id_alumno").value;

let lista = document.getElementById("listaDiarios");

var filtroAnioSelect = document.getElementById("filtroAnio");

async function filtroAnioAplicar(anio) {
    
    //Para limpiar la lista de diarios.
    for(let i = 0; i < lista.childNodes.length; i++) {
        lista.childNodes[i].remove();
    }

    await fetch('/diariosObtener?id=' + idAlumno, {method: 'GET'}).then(response => response.json()).then(data => {
        data.forEach(diario => {
            if(diario.periodo.split("/")[2] === anio) {
                var nuevaFila = document.createElement('tr');

                var columnaPeriodo = document.createElement('td');
                columnaPeriodo.scope = "row";
                columnaPeriodo.appendChild(document.createTextNode(diario.periodo));
                
                var columnaActividadesRealizadas = document.createElement('td');
                columnaActividadesRealizadas.appendChild(document.createTextNode(diario.actividades_realizadas));
               
                var columnaActividadesComentario = document.createElement('td');
                columnaActividadesComentario.appendChild(document.createTextNode(diario.actividades_comentario));
    
                var columnaAprendizaje = document.createElement('td');
                columnaAprendizaje.appendChild(document.createTextNode(diario.aprendizaje));
    
                var columnaAprendizajeComentario = document.createElement('td');
                columnaAprendizajeComentario.appendChild(document.createTextNode(diario.aprendizaje_comentario));
    
                var columnaProblemas = document.createElement('td');
                columnaProblemas.appendChild(document.createTextNode(diario.problemas));
    
                var columnaProblemasComentario = document.createElement('td');
                columnaProblemasComentario.appendChild(document.createTextNode(diario.problemas_comentario));
                
                nuevaFila.appendChild(columnaPeriodo);
                nuevaFila.appendChild(columnaActividadesRealizadas);
                nuevaFila.appendChild(columnaActividadesComentario);
                nuevaFila.appendChild(columnaAprendizaje);
                nuevaFila.appendChild(columnaAprendizajeComentario);
                nuevaFila.appendChild(columnaProblemas);
                nuevaFila.appendChild(columnaProblemasComentario);
                lista.appendChild(nuevaFila);
            } else {
                return false;
            }
        });
    });
}

async function filtroAnio() {

    var fechas = [];
    var num = 0;
    await fetch('/diariosObtener?id=' + idAlumno, {method: 'GET'}).then(response => response.json()).then(data => {
        data.forEach(diario => {
            fechas[num] = diario.periodo.split("/")[2];
            num++;
        });
    });

    // Filtro que permite solo tener fechas unicas
    let fechasUnicas = fechas.filter((item, index) => fechas.indexOf(item) === index);

    for(let i = 0; i < fechasUnicas.length; i++) {
        var nuevoOption = document.createElement('option');

        nuevoOption.value = fechasUnicas[i];

        nuevoOption.appendChild(document.createTextNode(fechasUnicas[i]));

        filtroAnioSelect.appendChild(nuevoOption);
    }
}

function obtenerDiarios() {
    fetch('/diariosObtener?id=' + idAlumno, {method: 'GET'}).then(response => response.json()).then(data => {
        data.forEach(diario => {
            var nuevaFila = document.createElement('tr');

            var columnaPeriodo = document.createElement('td');
            columnaPeriodo.scope = "row";
            columnaPeriodo.appendChild(document.createTextNode(diario.periodo));
            
            var columnaActividadesRealizadas = document.createElement('td');
            columnaActividadesRealizadas.appendChild(document.createTextNode(diario.actividades_realizadas));
           
            var columnaActividadesComentario = document.createElement('td');
            columnaActividadesComentario.appendChild(document.createTextNode(diario.actividades_comentario));

            var columnaAprendizaje = document.createElement('td');
            columnaAprendizaje.appendChild(document.createTextNode(diario.aprendizaje));

            var columnaAprendizajeComentario = document.createElement('td');
            columnaAprendizajeComentario.appendChild(document.createTextNode(diario.aprendizaje_comentario));

            var columnaProblemas = document.createElement('td');
            columnaProblemas.appendChild(document.createTextNode(diario.problemas));

            var columnaProblemasComentario = document.createElement('td');
            columnaProblemasComentario.appendChild(document.createTextNode(diario.problemas_comentario));
            
            nuevaFila.appendChild(columnaPeriodo);
            nuevaFila.appendChild(columnaActividadesRealizadas);
            nuevaFila.appendChild(columnaActividadesComentario);
            nuevaFila.appendChild(columnaAprendizaje);
            nuevaFila.appendChild(columnaAprendizajeComentario);
            nuevaFila.appendChild(columnaProblemas);
            nuevaFila.appendChild(columnaProblemasComentario);
            lista.appendChild(nuevaFila);
        });
    });
}

obtenerDiarios();

filtroAnio();

document.getElementById('filtrar').addEventListener('click', function() {
    lista.innerHTML = '';
    if(document.getElementById('filtroAnio').value !== "no") {
        filtroAnioAplicar(document.getElementById('filtroAnio').value);
    }
});

document.getElementById('reset').addEventListener('click', function() {
    lista.innerHTML = '';
    obtenerDiarios();
});