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
    tutorEmpresaFiltrado(null,paginaActualTutorEmpresa);
});
botonSiguienteTutorEmpresa.addEventListener('click', function () {
    paginaActualTutorEmpresa++;
    tutorEmpresaFiltrado(null,paginaActualTutorEmpresa);
});
function llamarFiltradoTutorEmpresa(evento) {
    paginaActualTutorEmpresa = 1;
    tutorEmpresaFiltrado(evento,paginaActualTutorEmpresa);
}
function tutorEmpresaFiltrado(evento,pagina = 1) {
    let formulario = new FormData(document.getElementById("filtrosTutoresEmpresas"));
    let parametros = new URLSearchParams(formulario);
    //fecht para enviar los datos
    fetch('/tutoresEmpresa/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            console.log('dentro');
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
            data.data['empresas'].forEach(function mostrar(element) {
                tabla.innerHTML += `
            <tr>
                <td>${element.nombrePersona}</td>
                <td>${element.apellidos}</td>
                <td>${element.email}</td>
                <td>${element.nombre}</td>
                <td>${element.departamento}</td>
            </tr>
                `;
            });
        });
}
function resetearFiltrosTutorEmpresa() {
    var reset = document.getElementById("filtrosTutoresEmpresas");
    reset.reset();
    tutorEmpresaFiltrado();
}
tutorEmpresaFiltrado(null);