"use strict";
import { validarEmpresa } from "../funciones/validarEmpresa.js";
import { enviarDatosEmpresa} from "../funciones/enviarDatosEmpresa";

class btnValidarempresa extends HTMLElement {
    constructor() {
        super();

        this.name;
        this.fDatos = this.fDatos.bind(this);
    }

    connectedCallback() {
        this.innerHTML = "<button class='btn-primary btn' type='submit' id='validarEmpresa' name='validar'>Guardar</button>";
        var btnValidarEmpresa = this.getElementById('validarEmpresa');
        btnValidarEmpresa.addEventListener("click", this.fDatos);
    }
    static get observedAttributes() {
        return ['name'];
    }

    /**
     * Se llama a esta función cuando se hace click sobre el boton Guardar
     * Esta función guarda el formulario en un objeto FormData y lo
     * envia como parámetro a la funcion validarEmpresa.
     * @param {*} e
     */
    fDatos(e) {
        e.preventDefault();
        var formulario = document.getElementById("formulario");
        var datos = new FormData(formulario);
        var validados = validarEmpresa(datos);

        console.log("validados = " + validados);
        if(validados){
            enviarDatosEmpresa(datos);
        }
    }
}
customElements.define('btn-validarempresa', btnValidarempresa);
