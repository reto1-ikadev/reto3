export function enviarDatos(datos) {
    console.log(datos.get("email"));
    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("http://localhost/personas/store", {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: JSON.stringify({"email":datos.get('email')}),

        });
        if(response.ok){
            window.location.href = "http://localhost/estudiantes/detalle/iker";
        }
        
        
    });
}
