export function enviarDatosTutorA(datos) {
    
    let response =  fetch("http://localhost/tutoresAcademicos/store", {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.CSRF_TOKEN
        },
        method: 'POST',
        body: JSON.stringify({
        "telefono_academico":datos.get('telefonoAcademico')
    })
    });
    if(response.ok){
        window.location.href = "http://localhost/estudiantes/detalle/iker";
    }
;
}