export function enviarDatosEmpresa(datos) {
    console.log(datos.get("nombre"));

        let response = fetch("/empresas/store", {
            headers: {
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: datos
        });
        if(response){
            window.location.href = "/estudiantes/index";
        }

}
