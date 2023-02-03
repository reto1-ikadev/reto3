export function enviarDatosAlumno(datos) {
    
        let response =  fetch("http://localhost/estudiantes/store", {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: JSON.stringify({
            "id_curso":datos.get('idCurso'),
            "id_tutor_academico":datos.get('idTutorA'),
            "id_tutor_empresa":datos.get('idTutorE'),
            "direccion":datos.get('direccion')
        })
        });
        if(response){
            window.location.href = "http://localhost/estudiantes/index";
        }
    ;
}

