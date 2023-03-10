
/**
 * Función que valida los datos que el usuario a introducido en el
 * formulario de alta
 * @param {*} datos Es un objeto FormData que contiene los datos que 
 * se han introducido en el formulario.
 */
export function validarEmpresa(datos: FormData) {
    try {
        var datosValidos: boolean = false;
        var nombreValido: boolean = false;
        var ciudadValida: boolean = false;
        var provinciaValida: boolean = false;
        var cpValido: boolean = false;
        var calleValida: boolean = false;
        var cifValido: boolean = false;
        var emailValido: boolean = false;
        var sectorValido: boolean = false;



        if (datos.get("nombre") == "") {
            throw "El nombre es un campo obligatorio";
        } else {
            nombreValido = validarCadena(<string>datos.get("nombre"));
            console.log(nombreValido);
        }
        if (datos.get("ciudad") == "") {
            throw "La ciudad es un campo obligatorio";
        } else {
            ciudadValida = validarCadena(<string>datos.get("ciudad"));
            console.log(ciudadValida);
        }

        if (datos.get("provincia") == "") {
            throw "La provincia es un campo obligatorio";
        } else {
            provinciaValida = validarCadena(<string>datos.get("provincia"));
            console.log(ciudadValida);
        }

        if (datos.get("cp") == "") {
            throw "El código postal es un campo obligatorio";
        } else {
            var regExpCp: RegExp = new RegExp(/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/);
            if (!regExpCp.test(<string>datos.get("cp"))) {
                throw "El código postal no es válido";
            } else {
                cpValido = true;
            }
        }

        if (datos.get("calle") == "") {
            throw "La calle es un campo obligatorio";
        } else {
            var regExpCalle: RegExp = new RegExp(/\w/);
            if (!regExpCalle.test(<string>datos.get("calle"))) {
                throw "La direccion no tiene el formato correcto";
            } else {
                calleValida = true;
            }
        }

        if (datos.get("cif") == "") {
            throw "El cif es un campo obligatorio";
        } else {
            var regExpCp: RegExp = new RegExp(/^[A-Za-z][1-9]{7}[A-Za-z]$/);
            if (!regExpCalle.test(<string>datos.get("cif"))) {
                throw "El cif no tiene el formato correcto";
            } else {
                cifValido = true;
            }
        }

        if (datos.get("email") == "") {
            throw "El email es un campo obligatorio";
        } else {
            var expRegEmail: RegExp = new RegExp(/[\w]+@{1}[\w]+\.[a-z]{2,3}/);
            if (!expRegEmail.test(<string>datos.get("email"))) {
                throw "El email no tiene el formato correcto";
            } else {
                emailValido = true;
            }
        }
        if (datos.get("sector") == "") {
            throw "El sector es un campo obligatorio";
        } else {
            sectorValido = validarCadena(<string>datos.get("sector"));
            console.log(sectorValido);
        }
        if(nombreValido && cifValido && emailValido && ciudadValida && provinciaValida 
            && cpValido && calleValida && sectorValido) {
            datosValidos = true

        }
        var dir:String = <string>datos.get("calle")+"-" + <string>datos.get("ciudad")+"-" + <string>datos.get("provincia")+"-" + <string>datos.get("cp") ;
        datos.set("direccion", <string>dir);
        return datosValidos;

    } catch (error) {
        console.log(error)
    }
}
/**
 * Funcion que recibe el nombre, apellido, ciudad o provincia y comprueba que tiene el formato correcto
 * @param {*} cadena 
 */
export function validarCadena(cadena: FormDataEntryValue): boolean {
    try {
        var cadenaValida: boolean = false;
        var regExp: RegExp = new RegExp(/^(?=.{3,15}$)[A-ZÁÉÍÓÚ][a-zñáéíóú]+(?: [A-ZÁÉÍÓÚ][a-zñáéíóú]+)?$/gm);
        if (!regExp.test(<string>cadena)) {
            var prueba = regExp.test(<string>cadena);
            //console.log(prueba + cadena);
            throw cadena + " no tiene el formato adecuado";
        } else {
            cadenaValida = true;
            console.log("nombre valido" + cadena);
        }
        return cadenaValida;

    } catch (error) {
        console.log(error);
        return false;
    }
}