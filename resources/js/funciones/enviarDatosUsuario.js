export function enviarDatosUsuario(datos) {
    
    let response =  fetch("http://localhost/user/store", {
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': window.CSRF_TOKEN
        },
        method: 'POST',
        body: JSON.stringify({
        "email":datos.get('email'),
        "password":datos.get('password')
    })
    });
    if(response){
        window.location.href = "http://localhost/estudiantes/index";
    }
;
}