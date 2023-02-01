
/**
 * Función que valida los datos que el usuario a introducido en el
 * formulario de alta
 * @param {*} datos Es un objeto FormData que contiene los datos que
 * se han introducido en el formulario.
 */
export function validar(datos:FormData) {
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
        
        if (datos.get("nombre") == "") {
            throw "El nombre es un campo obligatorio";
        }
        else {
            nombreValido = validarCadena(<string>datos.get("nombre"));
            console.log(nombreValido);
        }
        if (datos.get("apellido") == "") {
            throw "El apellido es un campo obligatorio";
        }
        else {
            apellidoValido = validarCadena(<string>datos.get("apellido"));
            console.log(apellidoValido);
        }
        if (datos.get("dni") == "") {
            throw "El dni es un campo obligatorio";
        }
        else {
            dniValido = validarDni(<string>datos.get("dni"));
        }
        if (datos.get("email") == "") {
            throw "El email es un campo obligatorio";
        }
        else {
            var expRegEmail = new RegExp(/[\w]+@{1}[\w]+\.[a-z]{2,3}/);
            if (!expRegEmail.test(<string>datos.get("email"))) {
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
            if (!expRegTelf.test(<string>datos.get("telefono"))) {
                throw "El telefono no tiene el formato correcto";
            }
            else {
                telefonoValido = true;
            }
        }
        /*Campos que se comprueban solo si es estudiante*/
        if (datos.get("tipo") == "alumno") {

            var selectGrado:HTMLSelectElement =<HTMLSelectElement> document.getElementById("grado");
            var idGrado = selectGrado.options[selectGrado.selectedIndex].id;
            datos.set("idGrado",idGrado);

            var selectCurso:HTMLSelectElement =<HTMLSelectElement> document.getElementById("curso");
            var idCurso = selectGrado.options[selectCurso.selectedIndex].id;
            datos.set("idCurso",idCurso);

            var selectEmpresa:HTMLSelectElement =<HTMLSelectElement> document.getElementById("empresa");
            var idEmpresa = selectEmpresa.options[selectEmpresa.selectedIndex].id;
            datos.set("idEmpresa",idEmpresa);

            var selectTutorA:HTMLSelectElement =<HTMLSelectElement> document.getElementById("tutorA");
            var idTutorA = selectTutorA.options[selectTutorA.selectedIndex].id;
            datos.set("idTutorA",idTutorA);

            var selectTutorE:HTMLSelectElement =<HTMLSelectElement> document.getElementById("tutorE");
            var idTutorE = selectTutorE.options[selectTutorE.selectedIndex].id;
            datos.set("idTutorE",idTutorE);

            if (datos.get("ciudad") == "") {
                throw "La ciudad es un campo obligatorio";
            }
            else {
                ciudadValida = validarCadena(<string>datos.get("ciudad"));
                console.log(ciudadValida+"ciudad");
            }
            if (datos.get("provincia") == "") {
                throw "La provincia es un campo obligatorio";
            }
            else {
                provinciaValida = validarCadena(<string>datos.get("provincia"));
                console.log(ciudadValida);
            }
            if (datos.get("cp") == "") {
                throw "El código postal es un campo obligatorio";
            }
            else {
                var regExpCp = new RegExp(/^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/);
                if (!regExpCp.test(<string>datos.get("cp"))) {
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
                if (!regExpCalle.test(<string>datos.get("calle"))) {
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
            if(datos.get("tipo")=="tutor_academico"){
                if(datos.get("coordinador")=="on"){
                    datos.set("tipo","coordinador");
                    console.log("He cambiado el tipo a coordinador "+ datos.get("tipo"));
                }
                if (datos.get("telefonoAcademico") == "") {
                    throw "El telefono academico es un campo obligatorio";
                }
                else {
                    var expRegTelf = new RegExp(/^[6-9][0-9]{8}$/);
                    if (!expRegTelf.test(<string>datos.get("telefonoAcademico"))) {
                        throw "El telefono academico no tiene el formato correcto";
                    }
                    else {
                        telefonoAcademicoValido = true;
                    }
                }
                if(nombreValido && apellidoValido && dniValido && emailValido && telefonoValido && telefonoAcademicoValido){
                    datosValidos = true;
                }
            }
            else{
                if(datos.get("tipo")=="tutor_empresa"){
                    departamentoValido = validarCadena(<string>datos.get("departamento"));
                }
                if (nombreValido && apellidoValido && dniValido && emailValido && telefonoValido && departamentoValido) {
                        datosValidos = true;
                     };
            }
            
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
    function validarDni(dni: FormDataEntryValue): boolean {
        console.log("funcion validar dni");
        try {
            var dniValido: boolean = false;
            var exprRegDni: RegExp = new RegExp(/^\d{8}[a-zA-Z]$/);
            if (!exprRegDni.test(<string>dni)) {
                throw "El dni no tiene el formato correcto";
            } else {
                var sNumero: string = dni.toString().substring(0, 8);
                var letraIntroducida: string = dni.toString().charAt(8);
                var iNumero: number = parseInt(sNumero);
                var resto: number = iNumero % 23;
                var letras: Array<string> = ['T','R','W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];
                var letra: string = letras[resto];

                if (letraIntroducida.toUpperCase() != letra) {
                    throw "El dni no es correcto";
                } else {
                    dniValido = true;
                }
            }
            return dniValido;

        } catch (error) {
            console.log(error);
            return false;
        }
    }

    /**
     * Funcion que recibe el nombre, apellido, ciudad o provincia y comprueba que tiene el formato correcto
     * @param {*} cadena 
     */
    function validarCadena(cadena: FormDataEntryValue): boolean {
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
}

