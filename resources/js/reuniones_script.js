// Agregamos al boton aniadir asistentes 

var asistentes = 2;

let objBotonAsisA = document.getElementById('aniadirAsistente'); // Boton que añade asistentes

let objBotonAsisQ = document.getElementById('quitarAsistente'); // Boton que quita asistentes

objBotonAsisA.addEventListener('click', function() {
    //alert("Hola ?");
    var asisNuevo = document.createElement('input');
    asisNuevo.name = "asistente" + asistentes;
    asistentes++;
    asisNuevo.type = "text";
    asisNuevo.classList.add("form-control");
    asisNuevo.placeholder = "Asistente";
    var lista = document.createElement('li');
    lista.id = "listaAsis" + (asistentes - 1);
    lista.appendChild(asisNuevo);
    var fila = document.getElementById('lista');
    fila.appendChild(lista);
});

objBotonAsisQ.addEventListener('click', function() {
    //alert("Hola ?");
    if(asistentes != 2) {
        document.getElementsByName("asistente" + (asistentes - 1))[0].remove();
        document.getElementById("listaAsis" + (asistentes - 1)).remove();
        asistentes--;
    }
});