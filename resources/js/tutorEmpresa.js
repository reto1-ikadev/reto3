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
    let x =0;
    //fecht para enviar los datos
    fetch('/tutoresEmpresa/filtrar?pagina=' + pagina + "&" + parametros, {
        method: 'GET',
    })
        .then(response => response.json())
        .then(data => {
            console.log('dentro');
            let tabla = document.getElementById('tabla');
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
                tabla.innerHTML += `
                <form action="http://localhost/tutoresEmpresas/update" method="post"> 
                <input type="hidden" name="_token" value="YV2eawmMbzFbC16rTX4QPAoIwkKkhbYULvCTjWY1">
                <input type="hidden" name="_method" value="PUT">
            <tr>
                <td><input type="text" value="${element.nombrePersona}" name="nombrePersona" class="editable${x}" disabled style="border:none;width:50%;"></td>
                <td><input type="text" value="${element.apellidos}" name="apellidos" class="editable${x}" disabled style="border:none;width:50%;"></td>
                <td><input type="text" value="${element.email}" name="email" class="editable${x}" disabled style="border:none;width:50%;"></td>
                <td><input type="text" value="${element.nombre}" name="nombre" class="editable${x}" disabled style="border:none;width:80%;"></td>
                <td><input type="text" value="${element.departamento}" name="departamento" class="editable${x}" disabled style="border:none;width:70%;"></td>
                <input type="text" hidden name="id_user" value="${element.id_user}">
                <input type="text" hidden name="id" value="${element.id}">
                <td><button id='${x}' class="btn bg-primary btn-sm">Editar </button></td>
                <td><div class="col-4 offset-8" id="botones${x}" style="display:flex;justify-content:start;"></div></td>
            </tr>
            </form>
                `;
            });
            for (let x = 1; x <= data.data['empresas'].length; x++) {
                var lapizEmpresa = document.getElementById(x);
                console.log(lapizEmpresa);   
                lapizEmpresa.addEventListener('click', function (e) { 
                e.preventDefault(); 
                var editables = document.getElementsByClassName('editable'+e.target.id);
                var botones = document.getElementById('botones'+e.target.id);
                botones.innerHTML = "<button type='submit' id='enviar' class='btn bg-primary btn-sm'>Guardar cambios</button>";
                for (var i = 1; i < editables.length; i++) {
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
