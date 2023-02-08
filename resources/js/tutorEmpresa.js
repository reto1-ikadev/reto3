let buttonTutorEmpresa = document.getElementById('btn');
buttonTutorEmpresa.addEventListener('click', llamarFiltradoTutorEmpresa);
let buttonResetTutorEmpresa = document.getElementById('btnReset');
buttonResetTutorEmpresa.addEventListener('click', resetearFiltrosTutorEmpresa);
let paginaActualTutorEmpresa = 1;
let botonAnteriorTutorEmpresa = document.getElementById('anterior');
let botonpaginaActualTutorEmpresa = document.getElementById('paginaActual');
let botonSiguienteTutorEmpresa = document.getElementById('siguiente');
botonAnteriorTutorEmpresa.addEventListener('click', function () {
    paginaActualTutorEmpresa--;
    tutorEmpresaFiltrado(null,paginaActualTutorEmpresa);
});
botonSiguienteTutorEmpresa.addEventListener('click', function () {
    paginaActualTutorEmpresa++;
    tutorEmpresaFiltrado(null,paginaActualTutorEmpresa);
});
function llamarFiltradoTutorEmpresa(evento) {
    paginaActualTutorEmpresa = 1;
    tutorEmpresaFiltrado(evento,paginaActualTutorEmpresa);
}
function tutorEmpresaFiltrado(evento,pagina = 1) {
    let formulario = new FormData(document.getElementById("filtrosTutoresEmpresas"));
    let parametros = new URLSearchParams(formulario);
    let x=0;
    let token = document.querySelector('meta[name=csrf-token]').content;
    //fecht para enviar los datos
    fetch('/tutoresEmpresa/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            console.log('dentro');
            let tabla = document.getElementById('accordion');
            tabla.innerHTML = '';
            let paginas = Math.ceil(data.data['total'] / data.data['por_pagina']);
            botonpaginaActualTutorEmpresa.innerHTML = data.data['pagina'];
            if (data.data['pagina'] == 1) {
                botonAnteriorTutorEmpresa.classList.add('disabled');
            }
            else {
                botonAnteriorTutorEmpresa.classList.remove('disabled');
            }
            if (data.data['pagina'] == paginas) {
                botonSiguienteTutorEmpresa.classList.add('disabled');
            }
            else {
                botonSiguienteTutorEmpresa.classList.remove('disabled');
            }
            if (data.data['total'] == 0) {
                botonAnteriorTutorEmpresa.classList.add('disabled');
                botonSiguienteTutorEmpresa.classList.add('disabled');
            }
            data.data['empresas'].forEach(function mostrar(element) {
                x++;
                accordion.innerHTML += `
                <form action="http://localhost/tutoresEmpresa/update" method="post">
                <input type="hidden" name="_token" value="${token}">
                <input type="hidden" name="_method" value="PUT">
            <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne${x}">
                    <button id="cabecera${x}"class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne${x}" aria-expanded="false" aria-controls="flush-collapseOne">
                    <input type="text" value="${element.nombre}" disabled class="editable${x}" disabled style="border:none;width:50%;background-color:transparent;">
                   </button>
                </h2>
                <div id="flush-collapseOne${x}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne${x}" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div> <b>Nombre:</b> <input type="text" value="${element.nombre}" name="nombre" class="editable${x}" disabled style="border:none;width:50%;background-color:transparent;"></div>
                        <div> <b>Apellidos:</b> <input type="text" value="${element.apellidos}" name="apellidos" class="editable${x}" disabled style="border:none;width:50%;background-color:transparent;"></div>
                        <div> <b> Email:</b><input type="text" value="${element.email}" name="email" class="editable${x}" disabled style="border:none;width:50%;background-color:transparent;"> </div>
                        <div> <b> Empresa:</b> <input type="text" value="${element.nombre}" name="nombre" class="editable${x}" disabled style="border:none;width:50%;background-color:transparent;"> </div>
                        <div> <b> Departamento:</b> <input type="text" value="${element.departamento}" name="departamento" class="editable${x}" disabled style="border:none;width:50%;background-color:transparent;"></div>
                        <br>
                        <input type="text" hidden name="id_user" value="${element.id_user}">
                        <input type="text" hidden name="id" value="${element.id}">
                        <button id='${x}' class="btn bg-primary btn-sm">Editar </button>
                        <div class="col-4 offset-8" id="botones${x}"></div>
                    </div>
                </div>
            </div>
        </div>
        </form>
        `;
            });
            for (let x = 1; x <= data.data['empresas'].length; x++) {
                var lapizEmpresa = document.getElementById(x);
                lapizEmpresa.addEventListener('click', function (e) {
                    e.preventDefault();
                    var editables = document.getElementsByClassName('editable'+e.target.id);
                    console.log(editables);
                    var botones = document.getElementById('botones'+e.target.id);
                    botones.innerHTML = "<button type='submit' id='enviar' class='btn bg-primary btn-sm'>Guardar cambios</button><button id='cancelar' type='submit' class=' btn bg-primary btn-sm'>Cancelar</button>";
                    for (var i = 0; i < editables.length; i++) {
                        editables[i].disabled = false;
                    }
                });
            }
        });
}
function resetearFiltrosTutorEmpresa() {
    var reset = document.getElementById("filtrosTutoresEmpresas");
    reset.reset();
    tutorEmpresaFiltrado();
}
tutorEmpresaFiltrado(null);
