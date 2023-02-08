let lista = document.getElementById("listaReuniones");

var filtroAnioSelect = document.getElementById("filtroAnioReunion");

var filtroConvSelect = document.getElementById("filtroConvocadores");

async function filtroAplicar(anio, convocador) {

    await fetch('/reunionesObtener', {method: 'GET'}).then(response => response.json()).then(data => {
        data.forEach(reunion => {
            if(reunion.fecha.split("-")[0] === anio || reunion.asistentes.split(", ")[0] === convocador) { // || semana == obtenerNumeroSemana(new Date(diario.periodo.split("/")[2] + "-" + diario.periodo.split("/")[1] + "-" + diario.periodo.split("/")[0]))
                var nuevaFila = document.createElement('tr');

                var columnaFecha = document.createElement('td');
                columnaFecha.scope = "row";
                columnaFecha.appendChild(document.createTextNode(reunion.fecha.split("-")[2] + "/" + reunion.fecha.split("-")[1] + "/" + reunion.fecha.split("-")[0]));

                var columnaTipoLugar = document.createElement('td');
                columnaTipoLugar.appendChild(document.createTextNode(reunion.tipo_lugar));
                
                var columnaAsistentes = document.createElement('td');
                
                var arrAsis = reunion.asistentes.split(", ");
                columnaAsistentes.appendChild(document.createTextNode("Convocador: " + arrAsis[0] + " | "));
                
                if(arrAsis[1] !== undefined) {
                    columnaAsistentes.appendChild(document.createTextNode("Asistentes: " + arrAsis[1]));
                    for(let i = 2; i < arrAsis.length; i++) {
                        columnaAsistentes.appendChild(document.createTextNode(", "));
                        columnaAsistentes.appendChild(document.createTextNode(arrAsis[i]));
                    }
                }
                
                var columnaObjetivos = document.createElement('td');
                columnaObjetivos.appendChild(document.createTextNode(reunion.objetivos));

                var columnaAspectos = document.createElement('td');
                columnaAspectos.appendChild(document.createTextNode(reunion.aspectos));
                
                nuevaFila.appendChild(columnaFecha);
                nuevaFila.appendChild(columnaTipoLugar);
                nuevaFila.appendChild(columnaAsistentes);
                nuevaFila.appendChild(columnaObjetivos);
                nuevaFila.appendChild(columnaAspectos);

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
    await fetch('/reunionesObtener', {method: 'GET'}).then(response => response.json()).then(data => {
        data.forEach(reunion => {
            fechas[num] = reunion.fecha.split("-")[0];
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

async function filtroConvocador() {
    var convocadores = [];
    var num = 0;
    await fetch('/reunionesObtener', {method: 'GET'}).then(response => response.json()).then(data => {
        data.forEach(reunion => {
            convocadores[num] = reunion.asistentes.split(", ")[0];
            num++;
        });
    });

    // Filtro que permite solo tener convocadores unicos
    let convocadoresUnicos = convocadores.filter((item, index) => convocadores.indexOf(item) === index);

    for(let i = 0; i < convocadoresUnicos.length; i++) {
        var nuevoOption = document.createElement('option');

        nuevoOption.value = convocadoresUnicos[i];

        nuevoOption.appendChild(document.createTextNode(convocadoresUnicos[i]));

        filtroConvSelect.appendChild(nuevoOption);
    }
}

function obtenerReuniones() {
    fetch('/reunionesObtener', {method: 'GET'}).then(response => response.json()).then(data => {
        data.forEach(reunion => {
            var nuevaFila = document.createElement('tr');

            var columnaFecha = document.createElement('td');
            columnaFecha.scope = "row";
            columnaFecha.appendChild(document.createTextNode(reunion.fecha.split("-")[2] + "/" + reunion.fecha.split("-")[1] + "/" + reunion.fecha.split("-")[0]));
            
            var columnaTipoLugar = document.createElement('td');
            columnaTipoLugar.appendChild(document.createTextNode(reunion.tipo_lugar));

            var columnaAsistentes = document.createElement('td');
            var arrAsis = reunion.asistentes.split(", ");
            columnaAsistentes.appendChild(document.createTextNode("Convocador: " + arrAsis[0] + " | "));
            if(arrAsis[1] !== undefined) {
                columnaAsistentes.appendChild(document.createTextNode("Asistentes: " + arrAsis[1]));
                for(let i = 2; i < arrAsis.length; i++) {
                    columnaAsistentes.appendChild(document.createTextNode(", "));
                    columnaAsistentes.appendChild(document.createTextNode(arrAsis[i]));
                }
            }
            

            var columnaObjetivos = document.createElement('td');
            columnaObjetivos.appendChild(document.createTextNode(reunion.objetivos));

            var columnaAspectos = document.createElement('td');
            columnaAspectos.appendChild(document.createTextNode(reunion.aspectos));
            
            nuevaFila.appendChild(columnaFecha);
            nuevaFila.appendChild(columnaTipoLugar);
            nuevaFila.appendChild(columnaAsistentes);
            nuevaFila.appendChild(columnaObjetivos);
            nuevaFila.appendChild(columnaAspectos);

            lista.appendChild(nuevaFila);
        });
    });
}

obtenerReuniones();

filtroAnio();

filtroConvocador();

document.getElementById('filtrarReunion').addEventListener('click', function() {
    if(document.getElementById('filtroAnioReunion').value !== "no" || document.getElementById('filtroConvocadores').value !== "no") {
        lista.innerHTML = '';
        filtroAplicar(document.getElementById('filtroAnioReunion').value, document.getElementById('filtroConvocadores').value);
    }
});

document.getElementById('resetReunion').addEventListener('click', function() {
    lista.innerHTML = '';
    obtenerReuniones();
});

document.getElementById('botonReunion').addEventListener('click', function() {
    window.location.href = "/reunion";
});