export function enviarDatosTutorE(datos) {
    console.log(datos.get("departamento"));
    let response =  fetch("http://localhost/tutoresEmpresa/store", {
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
            "id_empresa":datos.get('idEmpresa'),
            "departamento":datos.get('departamento'),
            "email":datos.get('email'),
            "password":datos.get('password')
    })
    });
    if(response){
        window.location.href = "http://localhost/estudiantes/index";
    }
;
}