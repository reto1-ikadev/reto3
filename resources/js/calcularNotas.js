var lapiz = document.getElementById('calcular');
lapiz.addEventListener('click', calcularNotaMediaDiario);

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
