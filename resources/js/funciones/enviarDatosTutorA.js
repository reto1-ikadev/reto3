export function enviarDatosTutorA(datos) {

    let response =  fetch("/tutoresAcademicos/store", {
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
            "telefono_academico":datos.get('telefonoAcademico'),
            "email":datos.get('email'),
            "password":datos.get('password')
    })
    });
    if(response){
        window.location.href = "/estudiantes/index";
    }
;
}
