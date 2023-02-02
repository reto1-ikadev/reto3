var button = document.getElementById('btn');
button.addEventListener('click', empresasFiltrado);
var buttonReset = document.getElementById('btnReset');
buttonReset.addEventListener('click', resetearFiltros);

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
            let paginacion = document.getElementById('pagination');
            paginacion.innerHTML = '';
            let paginas = Math.ceil(data.data['total'] / data.data['por_pagina']);

            for (let i = 1; i <= paginas; i++) {
                if (i == pagina) {
                    paginacion.innerHTML += `
                        <li class="page-item active"><a class="page-link" onclick="empresasFiltrado(null,${i})">${i}</a></li>
                    `;
                } else if (i == pagina - 1 || i == pagina + 1) {
                    paginacion.innerHTML += `
                        <li class="page-item"><a class="page-link"  onclick="empresasFiltrado(null,${i})">${i}</a></li>
                    `;
                } else if (i == 1 || i == paginas) {
                    paginacion.innerHTML += `
                        <li class="page-item"><a class="page-link"  onclick="empresasFiltrado(null,${i})">${i}</a></li>
                    `;
                } else if (i == pagina - 2 || i == pagina + 2) {
                    paginacion.innerHTML += `
                        <li class="page-item disabled"><a class="page-link">...</a></li>
                    `;
                }
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
