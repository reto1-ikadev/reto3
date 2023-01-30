var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
/**
 * Función que valida los datos que el usuario a introducido en el
 * formulario de alta
 * @param {*} datos Es un objeto FormData que contiene los datos que
 * se han introducido en el formulario.
 */
export function validar(datos) {
    try {
        var datosValidos = false;
        var nombreValido = false;
        var apellidoValido = false;
        var ciudadValida = false;
        var provinciaValida = false;
        var cpValido = false;
        var telefonoValido = false;
        var dniValido = false;
        var emailValido = false;
        var calleValida = false;
        var nombre = datos.get("nombre");
        if (datos.get("nombre") == "") {
            throw "El nombre es un campo obligatorio";
        }
        else {
            nombreValido = validarCadena(datos.get("nombre"));
            console.log(nombreValido);
        }
        if (datos.get("apellido") == "") {
            throw "El apellido es un campo obligatorio";
        }
        else {
            apellidoValido = validarCadena(datos.get("apellido"));
            console.log(apellidoValido);
        }
        if (datos.get("dni") == "") {
            throw "El dni es un campo obligatorio";
        }
        else {
            dniValido = validarDni(datos.get("dni"));
        }
        if (datos.get("email") == "") {
            throw "El email es un campo obligatorio";
        }
        else {
            var expRegEmail = new RegExp(/[\w]+@{1}[\w]+\.[a-z]{2,3}/);
            if (!expRegEmail.test(datos.get("email"))) {
                throw "El email no tiene el formato correcto";
            }
            else {
                emailValido = true;
            }
        }
        if (datos.get("telefono") == "") {
            throw "El telefono es un campo obligatorio";
        }
        else {
            var expRegTelf = new RegExp(/^[6-9][0-9]{8}$/);
            if (!expRegTelf.test(datos.get("telefono"))) {
                throw "El telefono no tiene el formato correcto";
            }
            else {
                telefonoValido = true;
            }
        }
        /*Campos que se comprueban solo si es estudiante*/
        if (datos.get("tipo") == "alumno") {
            if (datos.get("ciudad") == "") {
                throw "La ciudad es un campo obligatorio";
            }
            else {
                ciudadValida = validarCadena(datos.get("ciudad"));
                console.log(ciudadValida);
            }
            if (datos.get("provincia") == "") {
                throw "La provincia es un campo obligatorio";
            }
            else {
                provinciaValida = validarCadena(datos.get("provincia"));
                console.log(ciudadValida);
            }
            if (datos.get("cp") == "") {
                throw "El código postal es un campo obligatorio";
            }
            else {
                var regExpCp = new RegExp(/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/);
                if (!regExpCp.test(datos.get("cp"))) {
                    throw "El código postal no es válido";
                }
                else {
                    cpValido = true;
                }
            }
            if (datos.get("calle") == "") {
                throw "La calle es un campo obligatorio";
            }
            else {
                var regExpCalle = new RegExp(/\w/);
                if (!regExpCalle.test(datos.get("calle"))) {
                    throw "La direccion no tiene el formato correcto";
                }
                else {
                    calleValida = true;
                }
            }
            if (nombreValido && apellidoValido && dniValido && emailValido &&
                telefonoValido && ciudadValida && provinciaValida && cpValido && calleValida) {
                datosValidos = true;
            }
            ;
        }
        else {
            //Cuando no es estudiante
            if (nombreValido && apellidoValido && dniValido && emailValido && telefonoValido) {
                datosValidos = true;
            }
            ;
        }
        return datosValidos;
    }
    catch (error) {
        console.log(error);
    }
    /**
     * Recibe la cadena que el usuario introduce en el input dni y comprueba si es un dni correcto
     * @param {*} dni
     */
    function validarDni(dni) {
        console.log("funcion validar dni");
        try {
            var dniValido = false;
            var exprRegDni = new RegExp(/^\d{8}[a-zA-Z]$/);
            if (!exprRegDni.test(dni)) {
                throw "El dni no tiene el formato correcto";
            }
            else {
                var sNumero = dni.toString().substring(0, 8);
                var letraIntroducida = dni.toString().charAt(8);
                var iNumero = parseInt(sNumero);
                var resto = iNumero % 23;
                var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
                var letra = letras[resto];
                if (letraIntroducida.toUpperCase() != letra) {
                    throw "El dni no es correcto";
                }
                else {
                    dniValido = true;
                }
            }
            return dniValido;
        }
        catch (error) {
            console.log(error);
            return false;
        }
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
                //console.log(prueba + cadena);
                throw cadena + " no tiene el formato adecuado";
            }
            else {
                cadenaValida = true;
                console.log("nombre valido" + cadena);
            }
            return cadenaValida;
        }
        catch (error) {
            console.log(error);
            return false;
        }
    }
}

export function enviarDatos(datos) {
    console.log(datos.get("nombre"));
    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("http://localhost/personas/store", {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: JSON.stringify({"nombre":datos.get('nombre'),
            "apellido":datos.get('apellido'),
            "dni":datos.get('dni'),
            "telefono":datos.get('telefono'),
            "tipo":datos.get('tipo')})
        });
        if(response.ok){
            window.location.href = "http://localhost/estudiantes/detalle/iker";
        }
        
        
    });
}
