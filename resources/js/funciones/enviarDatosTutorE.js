export function enviarDatosTutorE(datos) {
    console.log(datos.get("departamento"));
    let response =  fetch("http://localhost/tutoresEmpresa/store", {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.CSRF_TOKEN
        },
        method: 'POST',
        body: JSON.stringify({
        "id_empresa":datos.get('idEmpresa'),
        "departamento":datos.get('departamento')
    })
    });
    if(response.ok){
        window.location.href = "http://localhost/estudiantes/detalle/iker";
    }
;
}