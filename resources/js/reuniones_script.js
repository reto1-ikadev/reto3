// Agregamos al boton aniadir asistentes 

var asistentes = 2;

let objBotonAsisA = document.getElementById('aniadirAsistente'); // Boton que añade asistentes

let objBotonAsisQ = document.getElementById('quitarAsistente'); // Boton que quita asistentes


//Event Listener para añadir los asistentes que queramos.
objBotonAsisA.addEventListener('click', function() {
    var asisNuevo = document.createElement('input');
    asisNuevo.name = "asistente" + asistentes;
    asistentes++;
    asisNuevo.type = "email";
    asisNuevo.classList.add("form-control");
    asisNuevo.placeholder = "Asistente";
    asisNuevo.required = true;
    var lista = document.createElement('li');
    lista.id = "listaAsis" + (asistentes - 1);
    lista.appendChild(asisNuevo);
    var fila = document.getElementById('lista');
    fila.appendChild(lista);
});


//Event Listener para quitar los asistentes que ya no queramos.
objBotonAsisQ.addEventListener('click', function() {
    if(asistentes != 2) {
        document.getElementsByName("asistente" + (asistentes - 1))[0].remove();
        document.getElementById("listaAsis" + (asistentes - 1)).remove();
        asistentes--;
    }
});