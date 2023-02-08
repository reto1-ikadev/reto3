let buttonEstudianteTutor = document.getElementById('btn');
buttonEstudianteTutor.addEventListener('click', llamarFiltradoEstudianteTutor);
let buttonResetEstudianteTutor = document.getElementById('btnReset');
buttonResetEstudianteTutor.addEventListener('click', resetearFiltrosEstudianteTutor);
let paginaActualEstudianteTutor = 1;
let botonAnteriorEstudianteTutor = document.getElementById('anterior');
let botonpaginaActualEstudianteTutor = document.getElementById('paginaActual');
let botonSiguienteEstudianteTutor = document.getElementById('siguiente');
botonAnteriorEstudianteTutor.addEventListener('click', function () {
    paginaActualEstudianteTutor--;
    alumnosFiltradoEstudianteTutor(null, paginaActualEstudianteTutor);
});
botonSiguienteEstudianteTutor.addEventListener('click', function () {
    paginaActualEstudianteTutor++;
    alumnosFiltradoEstudianteTutor(null, paginaActualEstudianteTutor);
});
function llamarFiltradoEstudianteTutor(evento) {
    paginaActualEstudianteTutor = 1;
    alumnosFiltradoEstudianteTutor(evento, paginaActualEstudianteTutor);
}
function alumnosFiltradoEstudianteTutor(evento, pagina = 1) {
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
        let paginas = Math.ceil(data.data['total'] / data.data['por_pagina']);
        botonpaginaActualEstudianteTutor.innerHTML = data.data['pagina'];
        if (data.data['pagina'] == 1) {
            botonAnteriorEstudianteTutor.classList.add('disabled');
        }
        else {
            botonAnteriorEstudianteTutor.classList.remove('disabled');
        }
        if (data.data['pagina'] == paginas) {
            botonSiguienteEstudianteTutor.classList.add('disabled');
        }
        else {
            botonSiguienteEstudianteTutor.classList.remove('disabled');
        }
        if (data.data['total'] == 0) {
            botonAnteriorEstudianteTutor.classList.add('disabled');
            botonSiguienteEstudianteTutor.classList.add('disabled');
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
function resetearFiltrosEstudianteTutor() {
    let formulario = document.getElementById("filtrosEstudiantes");
    formulario.reset();
    alumnosFiltradoEstudianteTutor(null);
}
alumnosFiltradoEstudianteTutor(null);
