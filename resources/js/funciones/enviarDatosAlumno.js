export function enviarDatosAlumno(datos) {

        let response =  fetch("/estudiantes/store", {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: JSON.stringify({
            "nombre":datos.get('nombre'),
            "apellido":datos.get('apellido'),
            "dni":datos.get('dni'),
            "telefono":datos.get('telefono'),
            "tipo":datos.get('tipo'),
            "id_curso":datos.get('idCurso'),
            "id_tutor_academico":datos.get('idTutorA'),
            "id_tutor_empresa":datos.get('idTutorE'),
            "direccion":datos.get('direccion'),
            "email":datos.get('email'),
            "password":datos.get('password')
        })
        });
        if(response){
            window.location.href = "/estudiantes/index";
        }
    ;
}

