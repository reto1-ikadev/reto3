//Funcion para enviar los datos de la empresa mediante un fetch 

export function enviarDatosEmpresa(datos) {
    console.log(datos.get("nombre"));
        let response = fetch("http://localhost/empresas/store", {
            headers: {
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: datos
        });
        if(response.ok){
            window.location.href = "http://localhost/estudiantes/detalle/iker";
        }
    };
