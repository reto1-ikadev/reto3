

//Pruebas para mejorar la funcion de calcular nota
var selectActitud = document.getElementById("actitud_nota");
var selectPuntualidad = document.getElementById("puntualidad_nota");
var selectResponsabilidad = document.getElementById("responsabilidad_nota");
var selectResolucion = document.getElementById("resolucion_problemas_nota");
var selectCalidad = document.getElementById("calidad_nota");
var selectImplicacion = document.getElementById("implicacion_nota");
var selectDecisiones = document.getElementById("decisiones_nota");
var selectComunicacion = document.getElementById("comunicacion_nota");
var selectPlanificacion = document.getElementById("planificacion_nota");
var selectAprendizaje = document.getElementById("aprendizaje_nota");
selectActitud.addEventListener("click", sumar);
selectPuntualidad.addEventListener("click", sumar);
selectResponsabilidad.addEventListener("click", sumar);
selectResolucion.addEventListener("click", sumar);
selectCalidad.addEventListener("click", sumar);
selectImplicacion.addEventListener("click", sumar);
selectDecisiones.addEventListener("click", sumar);
selectComunicacion.addEventListener("click", sumar);
selectPlanificacion.addEventListener("click", sumar);
selectAprendizaje.addEventListener("click", sumar);
var inputNota = document.getElementById("nota_final_empresa");
var resultadoEmpresa = 0;
inputNota.value = 0;
var arrayNotas = [0,0,0,0,0,0,0,0,0,0];


function sumar(e) {
    switch (e.target.id) {
        case "actitud_nota":
            var notaActitud = parseInt(
                e.target.options[e.target.selectedIndex].value
            );
            arrayNotas[0]=notaActitud;
            break;
        case "puntualidad_nota":
            var notaPuntualidad = parseInt(
                e.target.options[e.target.selectedIndex].value
            );
            arrayNotas[1]=notaPuntualidad;
            break;
        case "responsabilidad_nota":
            var notaResponsabilidad = parseInt(
                e.target.options[e.target.selectedIndex].value
            );
            arrayNotas[2]= notaResponsabilidad;
            break;
        case "resolucion_problemas_nota":
            var notaResolucion = parseInt(
                e.target.options[e.target.selectedIndex].value
            );
            arrayNotas[3]= notaResolucion;
            break;
        case "calidad_trabajo_nota":
            var notaCalidad = parseInt(
                e.target.options[e.target.selectedIndex].value
            );
            arrayNotas[4]=notaCalidad;
            break;
        case "implicacion_nota":
            var notaImplicacion = parseInt(
                e.target.options[e.target.selectedIndex].value
            );
            arrayNotas[5]= notaImplicacion;
            break;
        case "decisiones_nota":
            var notaDecisiones = parseInt(
                e.target.options[e.target.selectedIndex].value
            );
            arrayNotas[6]= notaDecisiones;
            break;
        case "comunicacion_nota":
            var notaComunicacion = parseInt(
                e.target.options[e.target.selectedIndex].value
            );
            arrayNotas[7]= notaComunicacion;
            break;
        case "planificacion_nota":
            var notaPlanificacion = parseInt(
                e.target.options[e.target.selectedIndex].value
            );
            arrayNotas[8]= notaPlanificacion;
            break;
        case "aprendizaje_nota":
            var notaAprendizaje = parseInt(
                e.target.options[e.target.selectedIndex].value
            );
            arrayNotas[9]= notaAprendizaje;
            break;
        default:
          
            break;
    }
    var media = arrayNotas.reduce((acumulador,valorActual)=>
    acumulador + valorActual,0
   )/10;
   inputNota.value = media;
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


var resultadoDiario = 0;
inputNotaFinal.value = 0;
var arrayNotasDiario = [0,0,0,0,0,0,0];

function sumarDiario(e) {
  switch (e.target.id) {
      case "regularidad_nota":
        console.log("he elegido regularidad");
          var notaRegularidad = parseInt(
              e.target.options[e.target.selectedIndex].value
          );
          arrayNotasDiario[0]=notaRegularidad;
          console.log(arrayNotasDiario);
          break;
      case "orden_nota":
          var notaOrden = parseInt(
              e.target.options[e.target.selectedIndex].value
          );
          arrayNotasDiario[1]=notaOrden;
          console.log(arrayNotasDiario);

          break;
      case "contenido_nota":
          var notaContenido = parseInt(
              e.target.options[e.target.selectedIndex].value
          );
          arrayNotasDiario[2]= notaContenido;
          console.log(arrayNotasDiario);
          break;
      case "terminologia_nota":
          var notaTerminologia = parseInt(
              e.target.options[e.target.selectedIndex].value
          );
          arrayNotasDiario[3]= notaTerminologia;
          console.log(arrayNotasDiario);
          break;
      case "calidad_nota":
          var notaCalidadD = parseInt(
              e.target.options[e.target.selectedIndex].value
          );
          arrayNotasDiario[4]=notaCalidadD;
          console.log(arrayNotasDiario);
          break;
      case "conceptos_nota":
          var notaConceptos = parseInt(
              e.target.options[e.target.selectedIndex].value
          );
          arrayNotasDiario[5]= notaConceptos;
          console.log(arrayNotasDiario);
          break;
      case "reflexion_nota":
          var notaReflexion = parseInt(
              e.target.options[e.target.selectedIndex].value
          );
          arrayNotasDiario[6]= notaReflexion;
          console.log(arrayNotasDiario);
          break;
      
      default:
        
          break;
  }
  var media = arrayNotasDiario.reduce((acumulador,valorActual)=>
  acumulador + valorActual,0
 )/7;
 inputNotaFinal.value = media.toFixed(1);
}


