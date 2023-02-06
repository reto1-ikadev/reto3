var lapiz = document.getElementById('calcular');
lapiz.addEventListener('click', calcularNotaMediaDiario);
var calc =document.getElementById("calcularEmpresa");
calc.addEventListener('click', calcularNotaMediaEmpresa);
function calcularNotaMediaEmpresa(){
  var inputActitud = document.getElementById("actitud_nota");
  var notaActitud = parseInt(inputActitud.options[inputActitud.selectedIndex].value);
  var inputPuntualidad = document.getElementById("puntualidad_nota");
  var notaPuntualidad = parseInt(inputPuntualidad.options[inputPuntualidad.selectedIndex].value);
  var inputResponsabilidad =document.getElementById("responsabilidad_nota");
  var notaResponsabilidad = parseInt(inputResponsabilidad.options[inputResponsabilidad.selectedIndex].value);
  var inputResolucion=document.getElementById("resolucion_problemas_nota");
  var notaResolucion = parseInt(inputResolucion.options[inputResolucion.selectedIndex].value);
  var inputCalidadTrabajos=document.getElementById("calidad_trabajos_nota");
  var notaCalidadTrabajos = parseInt(inputCalidadTrabajos.options[inputCalidadTrabajos.selectedIndex].value);
  var inputImplicacion=document.getElementById("implicacion_nota");
  var notaImplicacion = parseInt(inputImplicacion.options[inputImplicacion.selectedIndex].value);
  var inputDecisiones=document.getElementById("decisiones_nota");
  var notaDecisiones = parseInt(inputDecisiones.options[inputDecisiones.selectedIndex].value);
  var inputComunicacion=document.getElementById("comunicacion_nota");
  var notaComunicacion = parseInt(inputComunicacion.options[inputComunicacion.selectedIndex].value);
  var inputPlanificacion=document.getElementById("planificacion_nota");
  var notaPlanificacion = parseInt(inputPlanificacion.options[inputPlanificacion.selectedIndex].value);
  var inputAprendizaje=document.getElementById("aprendizaje_nota");
  var notaAprendizaje = parseInt(inputAprendizaje.options[inputAprendizaje.selectedIndex].value);
  
  var inputNotaFinalEmpresa = document.getElementById("nota_final_empresa");
  inputNotaFinalEmpresa.value = ((notaActitud + notaPuntualidad + notaResponsabilidad + notaResolucion + notaCalidadTrabajos + notaImplicacion + notaDecisiones+notaComunicacion+notaPlanificacion+notaAprendizaje)/10).toFixed(2);

  
}
function calcularNotaMediaDiario(){
  console.log("calculando");
    var inputRegularidad = document.getElementById("regularidad_nota");
    var notaRegularidad = parseInt(inputRegularidad.options[inputRegularidad.selectedIndex].value);
    
    var inputOrden = document.getElementById("orden_nota");
    var notaOrden = parseInt(inputOrden.options[inputOrden.selectedIndex].value);
    
    var inputContenido = document.getElementById("contenido_nota");
    var notaContenido = parseInt(inputContenido.options[inputContenido.selectedIndex].value);
    
    var inputTerminologia = document.getElementById("terminologia_nota");
    var notaTerminologia = parseInt(inputTerminologia.options[inputTerminologia.selectedIndex].value);
    
    var inputCalidad = document.getElementById("calidad_nota");
    var notaCalidad = parseInt(inputCalidad.options[inputCalidad.selectedIndex].value);
    
    var inputConceptos = document.getElementById("conceptos_nota");
    var notaConceptos = parseInt(inputConceptos.options[inputConceptos.selectedIndex].value);
    
    var inputReflexion = document.getElementById("reflexion_nota");
    var notaReflexion= parseInt(inputReflexion.options[inputReflexion.selectedIndex].value);
    
    var inputNotaFinal = document.getElementById("nota_final");
    inputNotaFinal.value = ((notaRegularidad + notaOrden + notaContenido + notaTerminologia + notaCalidad + notaConceptos + notaReflexion)/7).toFixed(2);
}
