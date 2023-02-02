let button = document.getElementById('btn');
button.addEventListener('click', llamarFiltrado);
let buttonReset = document.getElementById('btnReset');
buttonReset.addEventListener('click', resetearFiltros);
let paginaActual = 1;
let botonAnterior = document.getElementById('anterior');
let botonpaginaActual = document.getElementById('paginaActual');
let botonSiguiente = document.getElementById('siguiente');
botonAnterior.addEventListener('click', function () {
    paginaActual--;
    alumnosFiltrado(null, paginaActual);
});
botonSiguiente.addEventListener('click', function () {
    paginaActual++;
    alumnosFiltrado(null, paginaActual);
});

function llamarFiltrado(evento) {
    paginaActual=1;
    alumnosFiltrado(evento, paginaActual);
}
function alumnosFiltrado(evento, pagina = 1) {
    let formulario = new FormData(document.getElementById("filtrosEstudiantes"));
    let parametros = new URLSearchParams(formulario);
    //fecht para enviar los datos
    fetch('/misestudiantes/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            let tabla = document.getElementById('tabla');
            tabla.innerHTML = '';
            let paginacion = document.getElementById('pagination');
            let paginas = Math.ceil(data.data['total'] / data.data['por_pagina']);
            botonpaginaActual.innerHTML = data.data['pagina'];
            if (data.data['pagina'] == 1) {
                botonAnterior.classList.add('disabled');
            }
            else {
                botonAnterior.classList.remove('disabled');
            }
            if (data.data['pagina'] == paginas) {
                botonSiguiente.classList.add('disabled');
            }
            else {
                botonSiguiente.classList.remove('disabled');
            }
            if (data.data['total'] == 0) {
                botonAnterior.classList.add('disabled');
                botonSiguiente.classList.add('disabled');
            }
            data.data['estudiantes'].forEach(element => {
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
        })


}
function resetearFiltros() {
    document.getElementById("filtrosEstudiantes").reset();
    alumnosFiltrado(null);
}
alumnosFiltrado(null);

