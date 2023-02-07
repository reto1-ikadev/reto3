var idAlumno = document.getElementById("id_alumno").value;

let lista = document.getElementById("listaDiarios");

var filtroAnioSelect = document.getElementById("filtroAnio");

var filtroSemanaSelect = document.getElementById("filtroSemana");

async function filtroAplicar(anio, semana) {

    await fetch('/diariosObtener?id=' + idAlumno, {method: 'GET'}).then(response => response.json()).then(data => {
        data.forEach(diario => {
            if(diario.periodo.split("/")[2] === anio || semana == obtenerNumeroSemana(new Date(diario.periodo.split("/")[2] + "-" + diario.periodo.split("/")[1] + "-" + diario.periodo.split("/")[0]))) {
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

/*
ESTA FUNCION FUNCIONA PERO NO SE NECESITA
YA QUE SOLO CONSIGUE EL NUMERO DE SEMANA DE UN MES Y NO 
UN ANIO
function getWeekOfMonth(date) {
    let adjustedDate = date.getDate()+ date.getDay();
    let prefixes = ['0', '1', '2', '3', '4', '5'];
    return (parseInt(prefixes[0 | adjustedDate / 7])+1);
}
*/

function obtenerNumeroSemana(fecha) {
    var year = new Date(fecha.getFullYear(), 0, 1);
    var days = Math.floor((fecha - year) / (24 * 60 * 60 * 1000));
    return Math.ceil(( fecha.getDay() + 1 + days) / 7);
}

async function filtroSemana() {
    var semanas = [];
    var num = 0;
    await fetch('/diariosObtener?id=' + idAlumno, {method: 'GET'}).then(response => response.json()).then(data => {
        data.forEach(diario => {
            //semanas[num] = getWeekOfMonth(new Date(diario.periodo.split("/")[2] + "-" + diario.periodo.split("/")[1] + "-" + diario.periodo.split("/")[0]));
            semanas[num] = obtenerNumeroSemana(new Date(diario.periodo.split("/")[2] + "-" + diario.periodo.split("/")[1] + "-" + diario.periodo.split("/")[0]));
            num++;
        });
    });

    let semanasUnicas = semanas.filter((item, index) => semanas.indexOf(item) === index);

    for(let i = 0; i < semanasUnicas.length; i++) {
        var nuevoOption = document.createElement('option');

        nuevoOption.value = semanasUnicas[i];

        nuevoOption.appendChild(document.createTextNode("Semana " + semanasUnicas[i]));

        filtroSemanaSelect.appendChild(nuevoOption);
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

filtroSemana();

document.getElementById('filtrar').addEventListener('click', function() {
    lista.innerHTML = '';
    if(document.getElementById('filtroAnio').value !== "no" || document.getElementById('filtroSemana').value !== "no") {
        filtroAplicar(document.getElementById('filtroAnio').value, document.getElementById('filtroSemana').value);
    }
});

document.getElementById('reset').addEventListener('click', function() {
    lista.innerHTML = '';
    obtenerDiarios();
});

document.getElementById('botonDiario').addEventListener('click', function() {
    window.location.href = "/diario/" + document.getElementById("id_alumno").value;
});