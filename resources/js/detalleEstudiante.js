import './bootstrap';
import {clippingParents, eventListeners} from "@popperjs/core";
import collapse from "bootstrap/js/src/collapse";
//get url params
function getId() {
    let id = document.getElementById('id_persona').value;
return id;
}
function getPersona(){
    let id = getId();
    fetch('/estudiantes/encontrar?id='+id, {
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
                    <td><a class="btn btn-danger" href="/estudiantes/detalle/${element.id_alumno}">Ver</a></td>
                </tr>
                `;
            });
        }
        )
        .catch(error => {
            console.log(error);
        }
        );
    }
getPersona();


