var btnValidar = document.getElementById("altaGrado");
btnValidar.addEventListener("click",validarDatosGrado);


function validarDatosGrado(e){
    try {
        e.preventDefault();
        var formulario = document.getElementById("formulario");
        var datos = new FormData(formulario);

        var cadenaValida = false;
        var regExp = new RegExp(/^(?=.{3,15}$)[A-ZÁÉÍÓÚ][a-zñáéíóú]+(?: [A-ZÁÉÍÓÚ][a-zñáéíóú]+)?$/gm);
        if (!regExp.test(datos.get("nombre"))) {
            
            throw datos.get("nombre") + " no tiene el formato adecuado";
        } else {
            cadenaValida = true;
            
        }
       if(cadenaValida){
            console.log(datos.get("nombre"));
            enviarDatosGrado(datos);
            var selectCoordinador = document.getElementById("tutorA");
            var idCoordinador = selectCoordinador.options[selectCoordinador.selectedIndex].id;
            datos.set("coordinador",idCoordinador);
            datos.delete("nombre");
            enviarDatosGradoCoordinador(datos);
       }

    } catch (error) {
        console.log(error);
        return false;
    }
}

function enviarDatosGrado(datos) {
    console.log(datos.get("nombre"));
    
        let response = fetch("http://localhost/grado/store", {
            headers: {
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: datos
        });
        if(response.ok){
            window.location.href = "http://localhost/estudiantes/detalle/iker";
        }
    
}
function enviarDatosGrado(datos) {
    console.log(datos.get("nombre"));
    
        let response = fetch("http://localhost/grado/store", {
            headers: {
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: datos
        });
        if(response.ok){
            window.location.href = "http://localhost/estudiantes/detalle/iker";
        }
    
}