var lapizEmpresa:HTMLElement = <HTMLElement>document.getElementById('editar');
lapizEmpresa.addEventListener('click', habilitarEdicionEmpresa);
var editables = document.getElementsByClassName('editable');

function habilitarEdicionEmpresa(){
    var botones:HTMLElement = <HTMLElement> document.getElementById('botones');
    botones.innerHTML = "<button type='submit' class='ms-5 align-center btn bg-primary btn-sm ms-2'>Guardar cambios</button><button id='cancelar' type='submit' class='ms-5 align-center btn bg-primary btn-sm ms-2'>Cancelar</button>"

    for(var i=0;i<editables.length;i++){
        editables[i].disabled=false;
        editables[i].style.backgroundColor = '#E7E7E7';
    }
    divCombos.innerHTML = "<select class='form-select'name='nombreTA' id='comboTA' aria-label='select'>"+"</select>"+"<select class='form-select'name='nombreTE' id='comboTE' aria-label='select'>"+"</select>";
    var comboTutorAcademico = document.getElementById("comboTA");
    var comboTutorEmpresa = document.getElementById("comboTE");

    var tipo = "tutor_academico";
    var tutor = pedirTutoresAcademicos(tipo);
    /**
     * Tutor recibe los datos que devuelve el servidor de la base de datos
     * y con esos datos se llenan los combos con los nombres de los tutores
     */
    tutor.then((data) => {
        comboTutorAcademico.innerHTML =
            "<option selected disabled value='seleccionar'>Cambiar tutor academico</option>";
        data.data.forEach(function mostrar(element) {
            comboTutorAcademico.innerHTML +=
                "<option id='" +
                element.id +
                "' value='"+element.id+"'>" +
                element.nombre +
                "</option>";
        }
    )}
    );

    var tipo = "tutor_empresa";
    var tutor = pedirTutoresAcademicos(tipo);
    /**
     * Tutor recibe los datos que devuelve el servidor de la base de datos
     * y con esos datos se llenan los combos con los nombres de los tutores
     */
    tutor.then((data) => {
        comboTutorEmpresa.innerHTML =
            "<option selected disabled value='seleccionar'>Cambiar tutor de empresa</option>";
        data.data.forEach(function mostrar(element) {
            comboTutorEmpresa.innerHTML +=
                "<option id='" +
                element.id +
                "' value='"+element.id+"'>" +
                element.nombre +
                "</option>";
        }
    )}
    );

}



/**
 * Funcion que envia una peticion de datos de personas al servidor
 * @returns devuelve un array con los datos de las personas que hay en la base de datos
 */
async function pedirTutoresAcademicos(tipo) {
    let response = await fetch("http://localhost/personas/show/" + tipo, {
        method: "GET",
    });
    let result = await response.json();

    return result;
}