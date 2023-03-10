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
        var telefonoAcademicoValido = false;
        var departamentoValido = false;
        var empresaValida = false;
        var tutorAValido = false;
        var tutorEValido = false;
        var gradoValido = false;
        var cursoValido = false;
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
        switch (datos.get("tipo")) {
            case "alumno":
                var selectGrado = document.getElementById("grado");
                var idGrado = selectGrado.options[selectGrado.selectedIndex].id;
                if (idGrado == "") {
                    throw "El grado es un campo obligatorio";
                }
                else {
                    datos.set("idGrado", idGrado);
                    gradoValido = true;
                }
                var selectCurso = document.getElementById("curso");
                var idCurso = selectCurso.options[selectCurso.selectedIndex].id;
                if (idCurso == "") {
                    throw "El curso es un campo obligatorio";
                }
                else {
                    datos.set("idCurso", idCurso);
                    cursoValido = true;
                }
                var selectTutorA = document.getElementById("tutorA");
                var idTutorA = selectTutorA.options[selectTutorA.selectedIndex].id;
                if (idTutorA == "") {
                    throw "El tutor académico es un campo obligatorio";
                }
                else {
                    datos.set("idTutorA", idTutorA);
                    tutorAValido = true;
                }
                var selectTutorE = document.getElementById("tutorE");
                var idTutorE = selectTutorE.options[selectTutorE.selectedIndex].id;
                if (idTutorE == "") {
                    throw "El tutor de empresa es un campo obligatorio";
                }
                else {
                    datos.set("idTutorE", idTutorE);
                    tutorEValido = true;
                }
                if (datos.get("ciudad") == "") {
                    throw "La ciudad es un campo obligatorio";
                }
                else {
                    ciudadValida = validarCadena(datos.get("ciudad"));
                    console.log(ciudadValida + "ciudad");
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
                    telefonoValido && ciudadValida && provinciaValida && cpValido && calleValida && gradoValido && cursoValido && tutorAValido && tutorEValido) {
                    datosValidos = true;
                }
                ;
                break;
            case "tutor_academico":
                if (datos.get("coordinador") == "on") {
                    datos.set("tipo", "coordinador");
                    console.log("He cambiado el tipo a coordinador " + datos.get("tipo"));
                }
                if (datos.get("telefonoAcademico") == "") {
                    throw "El telefono academico es un campo obligatorio";
                }
                else {
                    var expRegTelf = new RegExp(/^[6-9][0-9]{8}$/);
                    if (!expRegTelf.test(datos.get("telefonoAcademico"))) {
                        throw "El telefono academico no tiene el formato correcto";
                    }
                    else {
                        telefonoAcademicoValido = true;
                    }
                }
                if (nombreValido && apellidoValido && dniValido && emailValido && telefonoValido && telefonoAcademicoValido) {
                    datosValidos = true;
                }
                break;
            case "tutor_empresa":
                var selectEmpresa = document.getElementById("empresa");
                var idEmpresa = selectEmpresa.options[selectEmpresa.selectedIndex].id;
                departamentoValido = validarCadena(datos.get("departamento"));
                console.log(datos.get("departamento"));
                if (idEmpresa == "") {
                    throw "La empresa es un campo obligatorio";
                }
                else {
                    datos.set("idEmpresa", idEmpresa);
                    console.log("id Empresa " + datos.get("idEmpresa"));
                    empresaValida = true;
                }
                if (nombreValido && apellidoValido && dniValido && emailValido && telefonoValido && departamentoValido && empresaValida) {
                    datosValidos = true;
                }
                ;
                break;
            default:
                break;
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
