let buttonTutorAcademico:HTMLElement = <HTMLElement>document.getElementById('btn');
buttonTutorAcademico.addEventListener('click', llamarFiltradoTutorAcademico);
let buttonResetTutorAcademico:HTMLElement = <HTMLElement>document.getElementById('btnReset');
buttonResetTutorAcademico.addEventListener('click', resetearFiltrosTutorAcademico);
let paginaActualTutorAcademico = 1;
let botonAnteriorTutorAcademico:HTMLElement = <HTMLElement>document.getElementById('anterior');
let botonpaginaActualTutorAcademico:HTMLElement = <HTMLElement>document.getElementById('paginaActual');
let botonSiguienteTutorAcademico:HTMLElement = <HTMLElement>document.getElementById('siguiente');
botonAnteriorTutorAcademico.addEventListener('click', function () {
    paginaActualTutorAcademico--;
    alumnosFiltradoTutorAcademico(null, paginaActualTutorAcademico);
});
botonSiguienteTutorAcademico.addEventListener('click', function () {
    paginaActualTutorAcademico++;
    alumnosFiltradoTutorAcademico(null, paginaActualTutorAcademico);
});

function llamarFiltradoTutorAcademico(evento:any) {
    paginaActualTutorAcademico=1;
    alumnosFiltradoTutorAcademico(evento, paginaActualTutorAcademico);
}
function alumnosFiltradoTutorAcademico(evento:any, pagina = 1) {
    let formulario:FormData =<FormData> new FormData(<HTMLFormElement>document.getElementById("filtrosEstudiantes"));
    let parametros:URLSearchParams = <URLSearchParams> new URLSearchParams(<URLSearchParams>formulario);
    //fecht para enviar los datos
    fetch('/tutoresAcademicos/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            let tabla:HTMLElement = <HTMLElement>document.getElementById('tabla');
            tabla.innerHTML = '';
            let paginas:Number = <Number>Math.ceil(data.data['total'] / data.data['por_pagina']);
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
            data.data['estudiantes'].forEach(function (element:any){
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
function resetearFiltrosTutorAcademico() {
    let formulario:HTMLFormElement = <HTMLFormElement>document.getElementById("filtrosEstudiantes");
    formulario.reset();
    alumnosFiltradoTutorAcademico(null);
}
alumnosFiltradoTutorAcademico(null);

