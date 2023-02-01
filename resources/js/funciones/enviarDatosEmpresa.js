//Funcion para enviar los datos de la empresa mediante un fetch 

export function enviarDatosEmpresa(datos) {
    console.log(datos.get("nombre"));
    return  function () {
        let response = fetch("http://localhost/empresas/store", {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: JSON.stringify({"nombre":datos.get('nombre')})
        });
        if(response.ok){
            window.location.href = "http://localhost/estudiantes/detalle/iker";
        }
    };
}