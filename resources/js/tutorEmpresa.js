let buttonTutorEmpresa = document.getElementById('btn');
buttonTutorEmpresa.addEventListener('click', llamarFiltradoTutorEmpresa);
let buttonResetTutorEmpresa = document.getElementById('btnReset');
buttonResetTutorEmpresa.addEventListener('click', resetearFiltrosTutorEmpresa);
let paginaActualTutorEmpresa = 1;
let botonAnteriorTutorEmpresa = document.getElementById('anterior');
let botonpaginaActualTutorEmpresa = document.getElementById('paginaActual');
let botonSiguienteTutorEmpresa = document.getElementById('siguiente');
botonAnteriorTutorEmpresa.addEventListener('click', function () {
    paginaActualTutorEmpresa--;
    tutorEmpresaFiltrado(paginaActualTutorEmpresa);
});
botonSiguienteTutorEmpresa.addEventListener('click', function () {
    paginaActualTutorEmpresa++;
    tutorEmpresaFiltrado(paginaActualTutorEmpresa);
});
function llamarFiltradoTutorEmpresa() {
    paginaActualTutorEmpresa = 1;
    tutorEmpresaFiltrado(paginaActualTutorEmpresa);
}
function tutorEmpresaFiltrado(pagina = 1) {
    let formulario = new FormData(document.getElementById("filtrosTutoresEmpresas"));
    let parametros = new URLSearchParams(formulario);
    //fecht para enviar los datos
    fetch('/tutoresEmpresa/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
        let tabla = document.getElementById('tabla');
        tabla.innerHTML = '';
        let paginas = Math.ceil(data.data['total'] / data.data['por_pagina']);
        botonpaginaActualTutorEmpresa.innerHTML = data.data['pagina'];
        if (data.data['pagina'] == 1) {
            botonAnteriorTutorEmpresa.classList.add('disabled');
        }
        else {
            botonAnteriorTutorEmpresa.classList.remove('disabled');
        }
        if (data.data['pagina'] == paginas) {
            botonSiguienteTutorEmpresa.classList.add('disabled');
        }
        else {
            botonSiguienteTutorEmpresa.classList.remove('disabled');
        }
        if (data.data['total'] == 0) {
            botonAnteriorTutorEmpresa.classList.add('disabled');
            botonSiguienteTutorEmpresa.classList.add('disabled');
        }
        data.data['estudiantes'].forEach(function mostrar(element) {
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
function resetearFiltrosTutorEmpresa() {
    var reset = document.getElementById("filtrosTutorEmpresa");
    reset.reset();
    tutorEmpresaFiltrado();
}
tutorEmpresaFiltrado();
