/**
 * Función que valida los datos que el usuario a introducido en el
 * formulario de alta
 * @param {*} datos Es un objeto FormData que contiene los datos que
 * se han introducido en el formulario.
 */
export function validarEmpresa(datos) {
    try {
        var datosValidos = false;
        var nombreValido = false;
        var ciudadValida = false;
        var provinciaValida = false;
        var cpValido = false;
        var calleValida = false;
        var cifValido = false;
        var telefonoValido = false;
        var emailValido = false;
        var sectorValido = false;
        if (datos.get("nombre") == "") {
            throw "El nombre es un campo obligatorio";
        }
        else {
            nombreValido = validarCadena(datos.get("nombre"));
            console.log(nombreValido);
        }
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
        if (datos.get("cif") == "") {
            throw "El cif es un campo obligatorio";
        }
        else {
            var regExpCp = new RegExp(/^[A-Za-z][1-9]{7}[A-Za-z]$/);
            if (!regExpCalle.test(datos.get("cif"))) {
                throw "El cif no tiene el formato correcto";
            }
            else {
                cifValido = true;
            }
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
        if (datos.get("sector") == "") {
            throw "El sector es un campo obligatorio";
        }
        else {
            sectorValido = validarCadena(datos.get("sector"));
            console.log(sectorValido);
        }
        if (nombreValido && cifValido && emailValido && telefonoValido && ciudadValida && provinciaValida
            && cpValido && calleValida && sectorValido) {
            datosValidos = true;
        }
        var dir = datos.get("calle") + "-" + datos.get("ciudad") + "-" + datos.get("provincia") + "-" + datos.get("cp");
        datos.set("direccion", dir);
        return datosValidos;
    }
    catch (error) {
        console.log(error);
    }
}
/**
 * Funcion que recibe el nombre, apellido, ciudad o provincia y comprueba que tiene el formato correcto
 * @param {*} cadena
 */
export function validarCadena(cadena) {
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
