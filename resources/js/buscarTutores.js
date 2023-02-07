let buttonTutorAcademico = document.getElementById('btn');
buttonTutorAcademico.addEventListener('click', llamarFiltradoTutorAcademico);
let buttonResetTutorAcademico  = document.getElementById('btnReset');
buttonResetTutorAcademico.addEventListener('click', resetearFiltrosTutorAcademico);
let paginaActualTutorAcademico  = 1;
let botonAnteriorTutorAcademico  = document.getElementById('anterior');
let botonpaginaActualTutorAcademico  = document.getElementById('paginaActual');
let botonSiguienteTutorAcademico  = document.getElementById('siguiente');
botonAnteriorTutorAcademico.addEventListener('click', function () {
    paginaActualTutorAcademico --;
    alumnosFiltradoTutorAcademico (null, paginaActualTutorAcademico );
});
botonSiguienteTutorAcademico.addEventListener('click', function () {
    paginaActualTutorAcademico ++;
    alumnosFiltradoTutorAcademico(null, paginaActualTutorAcademico );
});
function llamarFiltradoTutorAcademico(evento) {
    paginaActualTutorAcademico = 1;
    alumnosFiltradoTutorAcademico(evento, paginaActualTutorAcademico );
}
function alumnosFiltradoTutorAcademico(evento, pagina = 1) {
    let formulario = new FormData(document.getElementById("filtrosTutoresAcademicos"));
    let parametros = new URLSearchParams(formulario);
    //fecht para enviar los datos
    fetch('/tutoresAcademicos/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
})
        .then(response => response.json())
    .then(data => {
        let tabla = document.getElementById('tabla');
        tabla.innerHTML = '';
        let paginas = Math.ceil(data.data['total'] / data.data['por_pagina']);
        botonpaginaActualTutorAcademico.innerHTML = data.data['pagina'];
        if (data.data['pagina'] == 1) {
            botonAnteriorTutorAcademico.classList.add('disabled');
        }
        else {
            botonAnteriorTutorAcademico.classList.remove('disabled');
        }
        if (data.data['pagina'] == paginas) {
            botonSiguienteTutorAcademico.classList.add('disabled');
        }
        else {
            botonSiguienteTutorAcademico.classList.remove('disabled');
        }
        if (data.data['total'] == 0) {
            botonAnteriorTutorAcademico.classList.add('disabled');
            botonSiguienteTutorAcademico.classList.add('disabled');
        }
        data.data['estudiantes'].forEach(function (element) {
            tabla.innerHTML += `
                <tr>
                    <td>${element.nombre}</td>
                    <td>${element.apellidos}</td>
                    <td>${element.telefono}</td>
                    <td>${element.email}</td>
                </tr>
                `;
        });
    });
}
function resetearFiltrosTutorAcademico() {
    let formulario = document.getElementById("filtrosTutoresAcademicos");
    formulario.reset();
    alumnosFiltradoTutorAcademico(null);
}
alumnosFiltradoTutorAcademico(null);
