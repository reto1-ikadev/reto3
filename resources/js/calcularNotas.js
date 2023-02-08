//Pruebas para mejorar la funcion de calcular nota
var selectActitud = document.getElementById("actitud_nota");
var selectPuntualidad = document.getElementById("puntualidad_nota");
var selectResponsabilidad = document.getElementById("responsabilidad_nota");
var selectResolucion = document.getElementById("resolucion_problemas_nota");
var selectCalidad = document.getElementById("calidad_trabajos_nota");
var selectImplicacion = document.getElementById("implicacion_nota");
var selectDecisiones = document.getElementById("decisiones_nota");
var selectComunicacion = document.getElementById("comunicacion_nota");
var selectPlanificacion = document.getElementById("planificacion_nota");
var selectAprendizaje = document.getElementById("aprendizaje_nota");
var inputNota = document.getElementById("nota_final_empresa");

inputNota.value=2;

let caluclar = document.getElementById("calcularEmpresa");
caluclar.addEventListener("click",sumarEmpresa);
function sumarEmpresa() {

    var notaActitud = parseInt( selectActitud.options[selectActitud.selectedIndex].value);
    var notaPuntualidad = parseInt(selectPuntualidad.options[selectPuntualidad.selectedIndex].value);
    var notaResponsabilidad = parseInt(selectResponsabilidad.options[selectResponsabilidad.selectedIndex].value);
    var notaResolucion = parseInt(selectResolucion.options[selectResolucion.selectedIndex].value);
    var notaCalidad = parseInt(selectCalidad.options[selectCalidad.selectedIndex].value);
    var notaImplicacion = parseInt(selectImplicacion.options[selectImplicacion.selectedIndex].value);
    var notaDecisiones = parseInt(selectDecisiones.options[selectDecisiones.selectedIndex].value);
    var notaComunicacion = parseInt(selectComunicacion.options[selectComunicacion.selectedIndex].value);
    var notaPlanificacion = parseInt(selectPlanificacion.options[selectPlanificacion.selectedIndex].value);
    var notaAprendizaje = parseInt(selectAprendizaje.options[selectAprendizaje.selectedIndex].value);

    let notaMedia = (notaActitud + notaPuntualidad + notaResponsabilidad + notaResolucion + notaCalidad + notaImplicacion + notaDecisiones + notaComunicacion + notaPlanificacion + notaAprendizaje)/10;

    inputNota.value = notaMedia.toFixed(2);
}
var inputRegularidad = document.getElementById("regularidad_nota");
var inputOrden = document.getElementById("orden_nota");
var inputContenido = document.getElementById("contenido_nota");
var inputTerminologia = document.getElementById("terminologia_nota");
var inputCalidad = document.getElementById("calidad_nota");
var inputConceptos = document.getElementById("conceptos_nota");
var inputReflexion = document.getElementById("reflexion_nota");
var inputNotaFinal = document.getElementById("nota_final");

inputRegularidad.addEventListener("click", sumarDiario);
inputOrden.addEventListener("click", sumarDiario);
inputContenido.addEventListener("click", sumarDiario);
inputTerminologia.addEventListener("click", sumarDiario);
inputCalidad.addEventListener("click", sumarDiario);
inputConceptos.addEventListener("click", sumarDiario);
inputReflexion.addEventListener("click", sumarDiario);


inputNotaFinal.value = 2;


function sumarDiario() {
    var notaRegularidad = parseInt(inputRegularidad.options[inputRegularidad.selectedIndex].value);
    var notaOrden = parseInt(inputOrden.options[inputOrden.selectedIndex].value);
    var notaContenido = parseInt(inputContenido.options[inputContenido.selectedIndex].value);
    var notaTerminologia = parseInt(inputTerminologia.options[inputTerminologia.selectedIndex].value);
    var notaCalidad = parseInt(inputCalidad.options[inputCalidad.selectedIndex].value);
    var notaConceptos = parseInt(inputConceptos.options[inputConceptos.selectedIndex].value);
    var notaReflexion = parseInt(inputReflexion.options[inputReflexion.selectedIndex].value);

    let notaMedia = (notaRegularidad + notaOrden + notaContenido + notaTerminologia + notaCalidad + notaConceptos + notaReflexion)/7;

    inputNotaFinal.value = notaMedia.toFixed(2);
}

