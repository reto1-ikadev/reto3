let buttonEmpresa:HTMLElement = <HTMLElement>document.getElementById('btn');
buttonEmpresa.addEventListener('click', llamarFiltrado);
let buttonResetEmpresa:HTMLElement = <HTMLElement>document.getElementById('btnReset');
buttonResetEmpresa.addEventListener('click', resetearFiltrosEmpresas);
let paginaActualEmpresa:number = 1;
let botonAnteriorEmpresa:HTMLElement = <HTMLElement>document.getElementById('anterior');
let botonpaginaActualEmpresa:HTMLElement = <HTMLElement>document.getElementById('paginaActual');
let botonSiguienteEmpresa:HTMLElement = <HTMLElement>document.getElementById('siguiente');
botonAnteriorEmpresa.addEventListener('click', function () {
    paginaActualEmpresa--;
    empresasFiltrado(null, paginaActualEmpresa);
});
botonSiguienteEmpresa.addEventListener('click', function () {
    paginaActualEmpresa++;
    empresasFiltrado(null, paginaActualEmpresa);
});

function llamarFiltrado(evento:any) {
    paginaActualEmpresa=1;
    empresasFiltrado(evento, paginaActualEmpresa);
}
function empresasFiltrado(evento:any, pagina = 1) {

    let formulario:FormData =<FormData> new FormData(<HTMLFormElement>document.getElementById("filtrosEmpresas"));
    let parametros:URLSearchParams = <URLSearchParams> new URLSearchParams(<URLSearchParams>formulario);
    let x=1;
    //fetch para enviar los datos
    fetch('/empresas/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            let accordion:HTMLElement = <HTMLElement>document.getElementById('accordion');
            accordion.innerHTML = '';
            let paginas:Number = <Number> Math.ceil(data.data['total'] / data.data['por_pagina']);
            botonpaginaActualEmpresa.innerHTML = data.data['pagina'];
            if (data.data['pagina'] == 1) {
                botonAnteriorEmpresa.classList.add('disabled');
            }
            else {
                botonAnteriorEmpresa.classList.remove('disabled');
            }
            if (data.data['pagina'] == paginas) {
                botonSiguienteEmpresa.classList.add('disabled');
            }
            else {
                botonSiguienteEmpresa.classList.remove('disabled');
            }
            if (data.data['total'] == 0) {
                botonAnteriorEmpresa.classList.add('disabled');
                botonSiguienteEmpresa.classList.add('disabled');
            }
            data.data['empresas'].forEach(function(element:any){
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
                        <br>
                        <span id="editar" class="material-symbols-outlined">edit_square</span>
                        <div class="col-4 offset-8" id="botones"></div>
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
function resetearFiltrosEmpresas() {
    let formulario:HTMLFormElement = <HTMLFormElement>document.getElementById("filtrosEmpresas");
    formulario.reset();
    empresasFiltrado(null);
}
empresasFiltrado(null, 1);
