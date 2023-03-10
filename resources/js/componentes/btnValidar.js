"use strict";
import { validar } from "../funciones/validar.js";

import { enviarDatosAlumno } from "../funciones/enviarDatosAlumno.js";
import { enviarDatosTutorA } from "../funciones/enviarDatosTutorA.js";
import { enviarDatosTutorE } from "../funciones/enviarDatosTutorE.js";

class btnValidar extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: 'open' });
        this.name;
        this.fDatos = this.fDatos.bind(this);
    }

    connectedCallback() {
        this.shadowRoot.innerHTML = "<button type='submit' id='validar' name='validar'>Guardar</button>";
        var btValidar = this.shadowRoot.getElementById('validar');
        btValidar.addEventListener("click", this.fDatos);
    }
    static get observedAttributes() {
        return ['name'];
    }


    /**
     * Se llama a esta función cuando se hace click sobre el boton Guardar
     * Esta función guarda el formulario en un objeto FormData y lo
     * envia como parámetro a la funcion validar.
     * @param {*} e
     */
    fDatos(e) {
        e.preventDefault();
        var formulario = document.getElementById("formulario");
        var datos = new FormData(formulario);
        var validados = validar(datos);

        console.log("validados = " + validados);
        if(validados){
            if(datos.get("tipo")=="alumno"){
                enviarDatosAlumno(datos);
            }
            if(datos.get("tipo")=="tutor_academico"||datos.get("tipo")=="coordinador"){
                enviarDatosTutorA(datos);
            }
            if(datos.get("tipo")=="tutor_empresa"){
                enviarDatosTutorE(datos);
            }
        }
    }
}
customElements.define('btn-validar', btnValidar);
