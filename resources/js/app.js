import './bootstrap';
import {clippingParents, eventListeners} from "@popperjs/core";
import collapse from "bootstrap/js/src/collapse";
var button = document.getElementById('btn');
button.addEventListener('click', hola);
function hola(e) {
 e.preventDefault();
     let formulario = new FormData(document.getElementById("filtrosEstudiantes"));

     console.log(formulario.get("grado"));

    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("ttp://localhost/estudiantes/store", {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.CSRF_TOKEN
            },
            method: 'POST',
            body: JSON.stringify({"nombre":datos.get('nombre')}),
        });


    });
}
