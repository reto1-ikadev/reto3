let buttonEstudiantes:HTMLElement = <HTMLElement>document.getElementById('btn');
buttonEstudiantes.addEventListener('click', llamarFiltradoEstudiantes);
let buttonResetEstudiantes:HTMLElement = <HTMLElement>document.getElementById('btnReset');
buttonResetEstudiantes.addEventListener('click', resetearFiltrosEstudiantes);
let paginaActualEstudiantes = 1;
let botonAnteriorEstudiantes:HTMLElement = <HTMLElement>document.getElementById('anterior');
let botonpaginaActualEstudiantes:HTMLElement = <HTMLElement>document.getElementById('paginaActual');
let botonSiguienteEstudiantes:HTMLElement = <HTMLElement>document.getElementById('siguiente');
botonAnteriorEstudiantes.addEventListener('click', function () {
    paginaActualEstudiantes--;
    alumnosFiltradoEstudiantes(null, paginaActualEstudiantes);
});
botonSiguienteEstudiantes.addEventListener('click', function () {
    paginaActualEstudiantes++;
    alumnosFiltradoEstudiantes(null, paginaActualEstudiantes);
});

function llamarFiltradoEstudiantes(evento:any) {
    paginaActualEstudiantes=1;
    alumnosFiltradoEstudiantes(evento, paginaActualEstudiantes);
}
function alumnosFiltradoEstudiantes(evento:any, pagina = 1) {
    let formulario:FormData =<FormData> new FormData(<HTMLFormElement>document.getElementById("filtrosEstudiantes"));
    let parametros:URLSearchParams = <URLSearchParams> new URLSearchParams(<URLSearchParams>formulario);
    //fecht para enviar los datos
    fetch('/estudiantes/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            let tabla:HTMLElement = <HTMLElement>document.getElementById('tabla');
            tabla.innerHTML = '';
            let paginas:Number = <Number>Math.ceil(data.data['total'] / data.data['por_pagina']);
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
function resetearFiltrosEstudiantes() {
    let formulario:HTMLFormElement = <HTMLFormElement>document.getElementById("filtrosEstudiantes");
    formulario.reset();
    alumnosFiltradoEstudiantes(null);
}
alumnosFiltradoEstudiantes(null);

