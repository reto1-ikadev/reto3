"use strict";
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
    }
}

/**
 * Función que valida los datos que el usuario a introducido en el
 * formulario de alta
 * @param {*} datos Es un objeto FormData que contiene los datos que 
 * se han introducido en el formulario.
 */
function validar(datos) {
    try {
        var datosValidos = false;
        var nombreValido = false;
        var apellidoValido = false;
        var ciudadValida = false;
        var provinciaValida = false;
        var cpValido = false;
        var telefonoValido = false;
        //var anyoValido = false;
        var dniValido = false;
        var emailValido = false;
        var calleValida = false;

        if (datos.get("nombre") == "") {
            throw "El nombre es un campo obligatorio";
        } else {
            nombreValido = validarCadena(datos.get("nombre"));
            console.log(nombreValido);
        }

        if (datos.get("apellido") == "") {
            throw "El apellido es un campo obligatorio";
        } else {
            apellidoValido = validarCadena(datos.get("apellido"));
            console.log(apellidoValido);
        }

        if(datos.get("dni")==""){
            throw "El dni es un campo obligatorio";
        }else{
            dniValido = validarDni(datos.get("dni"));
        }

        if(datos.get("email")==""){
            throw "El email es un campo obligatorio";
        }else{
            var expRegEmail = new RegExp(/[\w]+@{1}[\w]+\.[a-z]{2,3}/);
            if(!expRegEmail.test(datos.get("email"))){
                throw "El email no tiene el formato correcto";
            }else{
                emailValido = true;
            }
        }

        if (datos.get("telefono") == "") {
            throw "El telefono es un campo obligatorio";
        } else {
            var expRegTelf = new RegExp(/^[6-9][0-9]{8}$/);
            if (!expRegTelf.test(datos.get("telefono"))) {
                throw "El telefono no tiene el formato correcto"
            } else {
                telefonoValido = true;
            }
        }

        /*Campos que se comprueban solo si es estudiante*/
        if (datos.get("accion") == "altaEst") {

            if (datos.get("ciudad") == "") {
                throw "La ciudad es un campo obligatorio";
            } else {
                ciudadValida = validarCadena(datos.get("ciudad"));
                console.log(ciudadValida);
            }

            if (datos.get("provincia") == "") {
                throw "La provincia es un campo obligatorio";
            } else {
                provinciaValida = validarCadena(datos.get("provincia"));
                console.log(ciudadValida);
            }

            if (datos.get("cp") == "") {
                throw "El código postal es un campo obligatorio";
            } else {
                var regExpCp = new RegExp(/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/);
                if (!regExpCp.test(datos.get("cp"))) {
                    throw "El código postal no es válido";
                } else {
                    cpValido = true;
                }
            }

            if(datos.get("calle")==""){
                throw "La calle es un campo obligatorio";
            }else{
                var regExpCalle = new RegExp(/\w/);
                if(!regExpCalle.test(datos.get("calle"))){
                    throw "La direccion no tiene el formato correcto";
                }else{
                    calleValida = true;
                }
            }
            if(nombreValido&&apellidoValido&&dniValido&&emailValido&&
                telefonoValido&&ciudadValida&&provinciaValida&&cpValido&&calleValida){
                datosValidos=true;
            };
        }else{
            //Cuando no es estudiante
            if(nombreValido&&apellidoValido&&dniValido&&emailValido&&telefonoValido){
                datosValidos=true;
            };
        }

        return datosValidos;

    } catch (error) {
        console.log(error)
    }

    /**
     * Recibe la cadena que el usuario introduce en el input dni y comprueba si es un dni correcto
     * @param {*} dni 
     */
    function validarDni(dni){
        console.log("funcion validar dni");
        try{
            var dniValido = true;
            return dniValido;
        }catch(error){console.log(error)}
    }

    /**
     * Funcion que recibe el nombre, apellido, ciudad o provincia y comprueba que tiene el formato correcto
     * @param {*} cadena 
     */
    function validarCadena(cadena) {
        try {
            var cadenaValida = false;
            var regExp = new RegExp(/^(?=.{3,15}$)[A-ZÁÉÍÓÚ][a-zñáéíóú]+(?: [A-ZÁÉÍÓÚ][a-zñáéíóú]+)?$/gm);
            if (!regExp.test(cadena)) {
                var prueba = regExp.test(cadena);
                console.log(prueba + cadena);
                throw cadena + " no tiene el formato adecuado";
            } else {
                cadenaValida = true;
                console.log("nombre valido" + cadena);
            }
            return cadenaValida;

        } catch (error) {
            console.log(error);
            return cadenaValida;
        }
    }
}
customElements.define('btn-validar', btnValidar);