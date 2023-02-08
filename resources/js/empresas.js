let buttonEmpresa = document.getElementById('btn');
buttonEmpresa.addEventListener('click', llamarFiltrado);
let buttonResetEmpresa = document.getElementById('btnReset');
buttonResetEmpresa.addEventListener('click', resetearFiltrosEmpresas);
let paginaActualEmpresa = 1;
let botonAnteriorEmpresa = document.getElementById('anterior');
let botonpaginaActualEmpresa = document.getElementById('paginaActual');
let botonSiguienteEmpresa = document.getElementById('siguiente');
botonAnteriorEmpresa.addEventListener('click', function () {
    paginaActualEmpresa--;
    empresasFiltrado(null, paginaActualEmpresa);
});
botonSiguienteEmpresa.addEventListener('click', function () {
    paginaActualEmpresa++;
    empresasFiltrado(null, paginaActualEmpresa);
});
function llamarFiltrado(evento) {
    paginaActualEmpresa = 1;
    empresasFiltrado(evento, paginaActualEmpresa);
}
function empresasFiltrado(evento, pagina = 1) {
    let formulario = new FormData(document.getElementById("filtrosEmpresas"));
    let parametros = new URLSearchParams(formulario);
    let x = 0;
    //fetch para enviar los datos
    fetch('/empresas/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
        let accordion = document.getElementById('accordion');
        accordion.innerHTML = '';
        let paginas = Math.ceil(data.data['total'] / data.data['por_pagina']);
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
        data.data['empresas'].forEach(function (element) {
            x++;
            accordion.innerHTML += `
                <form action="http://localhost/empresas/update" method="post"> 
                <input type="hidden" name="_token" value="YV2eawmMbzFbC16rTX4QPAoIwkKkhbYULvCTjWY1">
                <input type="hidden" name="_method" value="PUT">
            <div class="accordion accordion-flush" id="accordionFlushExample"> 
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne${x}">
                    <button id="cabecera${x}"class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne${x}" aria-expanded="false" aria-controls="flush-collapseOne">
                    <input type="text" value="${element.nombre}" class="editable${x}" readonly style="border:none;width:20%;background-color:transparent;">
                    </button>
                </h2>
                <div id="flush-collapseOne${x}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne${x}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                    
                        <div> <b>Sector:</b> <input type="text" value="${element.sector}" name="sector" class="editable${x}" disabled style="border:none;width:50%;"></div>
                        <div> <b> Email de la persona de contacto:</b><input type="text" value="${element.email_contacto}" name="email" class="editable${x}" disabled style="border:none;width:50%;"> </div>
                        <div> <b> CIF:</b> <input type="text" value="${element.cif}" name="cif" class="editable${x}" disabled style="border:none;width:50%;"> </div>
                        <div> <b> Direccion:</b> <input type="text" value="${element.direccion}" name="direccion" class="editable${x}" disabled style="border:none;width:50%;"></div>
                        <br>
                        <input type="text" hidden name="id" value="${element.id}">
                        <input type="text" hidden name="nombre" value="${element.nombre}">
                        <button id='${x}' class="btn bg-primary btn-sm">Editar </button>
                        <div class="col-4 offset-8" id="botones${x}"></div>
                    </div>
                </div>
            </div>
        </div>
        `;
        });

        for (let x = 1; x <= data.data['empresas'].length; x++) {
                var lapizEmpresa = document.getElementById(x);
                console.log(lapizEmpresa);   
                lapizEmpresa.addEventListener('click', function (e) { 
                        e.preventDefault(); 
                var editables = document.getElementsByClassName('editable'+e.target.id);
                var botones = document.getElementById('botones'+e.target.id);
                botones.innerHTML = "<button type='submit' id='enviar' class='ms-5 align-center btn bg-primary btn-sm ms-2'>Guardar cambios</button>";
                for (var i = 1; i < editables.length; i++) {
                    editables[i].disabled = false;
                }
            });

        }
    })
        .catch(error => {
        console.log(error);
    });
}
function resetearFiltrosEmpresas() {
    let formulario = document.getElementById("filtrosEmpresas");
    formulario.reset();
    empresasFiltrado(null);
}
empresasFiltrado(null, 1);
