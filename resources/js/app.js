import './bootstrap';
import {clippingParents, eventListeners} from "@popperjs/core";
import collapse from "bootstrap/js/src/collapse";
var button = document.getElementById('btn');
button.addEventListener('click', alumnosFiltrado);
var buttonReset = document.getElementById('btnReset');
buttonReset.addEventListener('click', resetearFiltros);
function alumnosFiltrado(evento,pagina = 1) {

    let formulario = new FormData(document.getElementById("filtrosEstudiantes"));
    let parametros = new URLSearchParams(formulario);
    //fecht para enviar los datos
    fetch('/estudiantes/filtrar?pagina='+pagina+"&"+parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            let tabla = document.getElementById('tabla');
            tabla.innerHTML = '';
            let paginacion = document.getElementById('pagination');
            paginacion.innerHTML = '';
            let paginas = Math.ceil(data.data['total']/data.data['por_pagina']);

            for (let i = 1; i <= paginas; i++) {
                paginacion.innerHTML += `<li class="page-item"><button type="button" id="${i}" class="page-link" onclick="alumnosFiltrado(null,${i})">${i}</button></li>`;
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
        .catch(error => {
            console.log(error);
        });

}
function resetearFiltros(){
    document.getElementById("filtrosEstudiantes").reset();
    alumnosFiltrado();
}
alumnosFiltrado(null,1);
