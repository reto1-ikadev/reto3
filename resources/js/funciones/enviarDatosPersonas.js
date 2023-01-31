export function enviarDatosPersona(datos) {
    console.log(datos.get("nombre"));
    return  function () {
        let response = fetch("http://localhost/personas/store", {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: JSON.stringify({"nombre":datos.get('nombre'),
            "apellido":datos.get('apellido'),
            "dni":datos.get('dni'),
            "telefono":datos.get('telefono'),
            "tipo":datos.get('tipo')})
        });
        if(response.ok){
            window.location.href = "http://localhost/estudiantes/detalle/iker";
        }
    };
}