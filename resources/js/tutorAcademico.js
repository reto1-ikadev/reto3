let buttonTutorAcademico = document.getElementById('btn');
buttonTutorAcademico.addEventListener('click', llamarFiltradoTutorAcademico);
let buttonResetTutorAcademico = document.getElementById('btnReset');
buttonResetTutorAcademico.addEventListener('click', resetearFiltrosTutorAcademico);
let paginaActualTutorAcademico = 1;
let botonAnteriorTutorAcademico = document.getElementById('anterior');
let botonpaginaActualTutorAcademico = document.getElementById('paginaActual');
let botonSiguienteTutorAcademico = document.getElementById('siguiente');
botonAnteriorTutorAcademico.addEventListener('click', function () {
    paginaActualTutorAcademico--;
    tutorAcademicoFiltrado(paginaActualTutorAcademico);
});
botonSiguienteTutorAcademico.addEventListener('click', function () {
    paginaActualTutorAcademico++;
    tutorAcademicoFiltrado(paginaActualTutorAcademico);
});
function llamarFiltradoTutorAcademico() {
    paginaActualTutorAcademico = 1;
    tutorAcademicoFiltrado(paginaActualTutorAcademico);
}
function tutorAcademicoFiltrado(pagina = 1) {
    let formulario = new FormData(document.getElementById("filtrosTutoresAcademicos"));
    let parametros = new URLSearchParams(formulario);
    let x = 0;
    let token = document.querySelector('meta[name=csrf-token]').content;
    //fecht para enviar los datos
    fetch('/tutoresAcademicos/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            let tabla = document.getElementById('accordion');
            tabla.innerHTML = '';
            let paginas = Math.ceil(data.data['total'] / data.data['por_pagina']);
            botonpaginaActualTutorAcademico.innerHTML = data.data['pagina'];
            if (data.data['pagina'] == 1) {
                botonAnteriorTutorAcademico.classList.add('disabled');
            }
            else {
                botonAnteriorTutorAcademico.classList.remove('disabled');
            }
            if (data.data['pagina'] == paginas) {
                botonSiguienteTutorAcademico.classList.add('disabled');
            }
            else {
                botonSiguienteTutorAcademico.classList.remove('disabled');
            }
            if (data.data['total'] == 0) {
                botonAnteriorTutorAcademico.classList.add('disabled');
                botonSiguienteTutorAcademico.classList.add('disabled');
            }
            data.data['tutorAcademico'].forEach(function mostrar(element) {
                x++;
                tabla.innerHTML += `
               <form action="http://localhost/tutoresAcademicos/update" method="post">
               <input type="hidden" name="_token" value="${token}">
               <input type="hidden" name="_method" value="PUT">
               <div class="accordion accordion-flush" id="accordionFlushExample">
           <div class="accordion-item">
               <h2 class="accordion-header" id="flush-headingOne${x}">
                   <button id="cabecera${x}"class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne${x}" aria-expanded="false" aria-controls="flush-collapseOne">
                   <input type="text" value="${element.nombre}" disabled class="editable${x}" disabled style="border:none;width:50%;background-color:transparent">
                  </button>
               </h2>
               <div id="flush-collapseOne${x}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne${x}" data-bs-parent="#accordionFlushExample">
                   <div class="accordion-body">
                       <div> <b>Nombre:</b> <input type="text" value="${element.nombre}" name="nombre" class="editable${x}" disabled style="border:none;width:50%;"></div>
                       <div> <b>Apellidos:</b> <input type="text" value="${element.apellidos}" name="apellidos" class="editable${x}" disabled style="border:none;width:50%;"></div>
                       <div> <b> Email:</b><input type="text" value="${element.email}" name="email" class="editable${x}" disabled style="border:none;width:50%;"> </div>
                       <div> <b> Telefono:</b> <input type="text" value="${element.telefono}" name="telefono" class="editable${x}" disabled style="border:none;width:50%;"></div>
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
            for (let x = 1; x <= data.data['tutorAcademico'].length; x++) {
                var lapizTutorAcademico = document.getElementById(x.toString());
                lapizTutorAcademico.addEventListener('click', function (e) {
                    e.preventDefault();
                    var editables = document.getElementsByClassName('editable' + e.target.id);
                    var botones = document.getElementById('botones' + e.target.id);
                    botones.innerHTML = "<button type='submit' id='enviar' class='btn bg-primary btn-sm'>Guardar cambios</button>";
                    for (var i = 1; i < editables.length; i++) {
                        editables[i].disabled = false;
                    }
                });
            }
        });
}
function resetearFiltrosTutorAcademico() {
    var reset = document.getElementById("filtrosTutorAcademico");
    reset.reset();
    tutorAcademicoFiltrado();
}
tutorAcademicoFiltrado();
