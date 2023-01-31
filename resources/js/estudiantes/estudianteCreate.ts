var comboGrados:HTMLElement = <HTMLElement>document.getElementById("grado");
var comboCursos:HTMLElement = <HTMLElement>document.getElementById("curso");
var comboEmpresas:HTMLElement =<HTMLElement>document.getElementById("empresa");
var comboTutorEmpresa:HTMLElement = <HTMLElement>document.getElementById("tutorE");
var comboTutorAcademico:HTMLElement = <HTMLElement>document.getElementById("tutorA");

window.onload = function () {
    var tutor = pedirTutores();
    tutor.then((data) => {
        console.log(data.data);
        comboTutorAcademico.innerHTML="<option selected disabled value='seleccionar'>Tutor empresa</option>";
        data.data.forEach(function mostrar(element:any){
            if(element.tipo == 'tutor_academico'){
                comboTutorAcademico.innerHTML+="<option id='"+element.id+"'>"+element.nombre+"</option>";
            }
            if(element.tipo == 'tutor_empresa'){
                comboTutorEmpresa.innerHTML+="<option id='"+element.id+"'>"+element.nombre+"</option>";
            }
            
        });
    });

    var empresas = pedirEmpresas();
    empresas.then((data) => {
        console.log(data.data);
        comboEmpresas.innerHTML="<option selected disabled value='seleccionar'>Empresa</option>";
        data.data.forEach(function mostrar(element:any){
            comboEmpresas.innerHTML+="<option id='"+element.id+"'>"+element.nombre+"</option>"
        });
    });
    var grados = pedirGrados();
    grados.then((data) => {
        console.log(data.data);
        comboGrados.innerHTML="<option selected disabled value='seleccionar'>Grado</option>";
        data.data.forEach(function mostrar(element:any){
            comboGrados.innerHTML+="<option id='"+element.id+"'>"+element.nombre+"</option>"
        });
    });
    var cursos = pedirCursos();
    cursos.then((data) => {
        console.log(data.data);
        comboCursos.innerHTML="<option selected disabled value='seleccionar'>Curso</option>";
        data.data.forEach(function mostrar(element:any){
            comboCursos.innerHTML+="<option id='"+element.id+"'>"+element.nombre+"</option>"
        });
    });
};
async function pedirTutores() {
    let response = await fetch("http://localhost/personas/index", {
        method: "GET",
    });
    let result = await response.json();

    return result;
}

async function pedirEmpresas() {
    let response = await fetch("http://localhost/empresas/index", {
        method: "GET",
    });
    let result = await response.json();

    return result;
}
async function pedirCursos() {
    let response = await fetch("http://localhost/cursos/index", {
        method: "GET",
    });
    let result = await response.json();

    return result;
}
async function pedirGrados() {
    let response = await fetch("http://localhost/grados/index", {
        method: "GET",
    });
    let result = await response.json();

    return result;
}
