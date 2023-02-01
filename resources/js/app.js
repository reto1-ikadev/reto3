import './bootstrap';
import {clippingParents, eventListeners} from "@popperjs/core";
import collapse from "bootstrap/js/src/collapse";
var button = document.getElementById('btn');
button.addEventListener('click', hola);
function hola(e) {
    e.preventDefault();
    let formulario = new FormData(document.getElementById("filtrosEstudiantes"));
    let parametros = new URLSearchParams(formulario);
    //fecht para enviar los datos
    fetch('/estudiantes/filtrar?'+parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            let tabla = document.getElementById('tabla');
            tabla.innerHTML = '';
            data.data.forEach(element => {
                tabla.innerHTML += `
                <tr>
                    <td>${element.nombre}</td>
                    <td>${element.apellidos}</td>
                    <td>${element.grado}</td>
                    <td>${element.curso}</td>
                    <td>${element.empresa}</td>
                    <td><a href="/estudiantes/detalle?id=${element.id_alumno}" class="btn btn-primary">Ver</a></td>           </tr>
                `;

            });
        })
        .catch(error => {
            console.log(error);
        });
