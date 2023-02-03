let button = document.getElementById('btn');
button.addEventListener('click', llamarFiltrado);
let buttonReset = document.getElementById('btnReset');
buttonReset.addEventListener('click', resetearFiltros);
let paginaActual = 1;
let botonAnterior = document.getElementById('anterior');
let botonpaginaActual = document.getElementById('paginaActual');
let botonSiguiente = document.getElementById('siguiente');
botonAnterior.addEventListener('click', function () {
    paginaActual--;
    empresasFiltrado(null, paginaActual);
});
botonSiguiente.addEventListener('click', function () {
    paginaActual++;
    empresasFiltrado(null, paginaActual);
});

function llamarFiltrado(evento) {
    paginaActual=1;
    empresasFiltrado(evento, paginaActual);
}
function empresasFiltrado(evento, pagina = 1) {

    let formulario = new FormData(document.getElementById("filtrosEmpresas"));
    let parametros = new URLSearchParams(formulario);
    let x=1;
    //fetch para enviar los datos
    fetch('/empresas/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            let accordion = document.getElementById('accordion');
            accordion.innerHTML = '';
            let paginas = Math.ceil(data.data['total'] / data.data['por_pagina']);
            botonpaginaActual.innerHTML = data.data['pagina'];
            if (data.data['pagina'] == 1) {
                botonAnterior.classList.add('disabled');
            }
            else {
                botonAnterior.classList.remove('disabled');
            }
            if (data.data['pagina'] == paginas) {
                botonSiguiente.classList.add('disabled');
            }
            else {
                botonSiguiente.classList.remove('disabled');
            }
            if (data.data['total'] == 0) {
                botonAnterior.classList.add('disabled');
                botonSiguiente.classList.add('disabled');
            }
            data.data['empresas'].forEach(element => {
                x++;
                accordion.innerHTML += `
            
            <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne${x}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne${x}" aria-expanded="false" aria-controls="flush-collapseOne">
                        ${element.nombre}
                    </button>
                </h2>
                <div id="flush-collapseOne${x}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne${x}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div> <b>Sector:</b> ${element.sector}</div>
                        <div> <b> Email de la persona de contacto:</b> ${element.email_contacto} </div>
                        <div> <b> CIF:</b> ${element.cif} </div>
                        <div> <b> Direccion:</b> ${element.direccion}</div>
                    </div>
                </div>
            </div>
        </div>
        `;
        });
        })
        .catch(error => {
            console.log(error);
        });

}
function resetearFiltros() {
    document.getElementById("filtrosEmpresas").reset();
    empresasFiltrado();
}
empresasFiltrado(null, 1);
