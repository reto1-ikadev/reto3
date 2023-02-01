"use strict";

import { validar, enviarDatosPersona, enviarDatosAlumno } from "../funciones/validar.js";

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
                enviarDatosPersona(datos);
               // enviarDatosAlumno(datos);
            }
            if(datos.get("tipo")=="tutor_academico"||datos.get("tipo")=="coordinador"||datos.get("tipo")=="tutor_empresa"){
                enviarDatosPersona(datos);
            }
        }
    }
}
customElements.define('btn-validar', btnValidar);