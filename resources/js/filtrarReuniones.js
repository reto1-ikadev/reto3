let lista = document.getElementById("listaReuniones");

function obtenerReuniones() {
    fetch('/reunionesObtener', {method: 'GET'}).then(response => response.json()).then(data => {
        data.forEach(reunion => {
            var nuevaFila = document.createElement('tr');

            var columnaFecha = document.createElement('td');
            columnaFecha.scope = "row";
            columnaFecha.appendChild(document.createTextNode(reunion.fecha));
            
            var columnaTipoLugar = document.createElement('td');
            columnaTipoLugar.appendChild(document.createTextNode(reunion.tipo_lugar));

            var columnaAsistentes = document.createElement('td');
            columnaAsistentes.appendChild(document.createTextNode("Convocador: " + reunion.asistentes));

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

document.getElementById('botonReunion').addEventListener('click', function() {
    window.location.href = "/reunion";
});