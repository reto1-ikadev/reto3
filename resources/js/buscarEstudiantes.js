let buttonEstudiantes = document.getElementById('btn');
buttonEstudiantes.addEventListener('click', llamarFiltradoEstudiantes);
let buttonResetEstudiantes = document.getElementById('btnReset');
buttonResetEstudiantes.addEventListener('click', resetearFiltrosEstudiantes);
let paginaActualEstudiantes = 1;
let botonAnteriorEstudiantes = document.getElementById('anterior');
let botonpaginaActualEstudiantes = document.getElementById('paginaActual');
let botonSiguienteEstudiantes = document.getElementById('siguiente');
botonAnteriorEstudiantes.addEventListener('click', function () {
    paginaActualEstudiantes--;
    alumnosFiltradoEstudiantes(null, paginaActualEstudiantes);
});
botonSiguienteEstudiantes.addEventListener('click', function () {
    paginaActualEstudiantes++;
    alumnosFiltradoEstudiantes(null, paginaActualEstudiantes);
});
function llamarFiltradoEstudiantes(evento) {
    paginaActualEstudiantes = 1;
    alumnosFiltradoEstudiantes(evento, paginaActualEstudiantes);
}
function alumnosFiltradoEstudiantes(evento, pagina = 1) {
    let formulario = new FormData(document.getElementById("filtrosEstudiantes"));
    let parametros = new URLSearchParams(formulario);
    //fecht para enviar los datos
    fetch('/estudiantes/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
        let tabla = document.getElementById('tabla');
        tabla.innerHTML = '';
        let paginas = Math.ceil(data.data['total'] / data.data['por_pagina']);
        botonpaginaActualEstudiantes.innerHTML = data.data['pagina'];
        if (data.data['pagina'] == 1) {
            botonAnteriorEstudiantes.classList.add('disabled');
        }
        else {
            botonAnteriorEstudiantes.classList.remove('disabled');
        }
        if (data.data['pagina'] == paginas) {
            botonSiguienteEstudiantes.classList.add('disabled');
        }
        else {
            botonSiguienteEstudiantes.classList.remove('disabled');
        }
        if (data.data['total'] == 0) {
            botonAnteriorEstudiantes.classList.add('disabled');
            botonSiguienteEstudiantes.classList.add('disabled');
        }
        data.data['estudiantes'].forEach(function (element) {
            tabla.innerHTML += `
                <tr>
                    <td>${element.nombre}</td>
                    <td>${element.apellidos}</td>
                    <td>${element.grado}</td>
                    <td>${element.curso}</td>
                    <td>${element.empresa}</td>
                    <td><a href="/estudiantes/detalle/${element.id_alumno}" class="btn btn-primary">Ver</a></td>
                </tr>
                `;
        });
    });
}
function resetearFiltrosEstudiantes() {
    let formulario = document.getElementById("filtrosEstudiantes");
    formulario.reset();
    alumnosFiltradoEstudiantes(null);
}
alumnosFiltradoEstudiantes(null);
