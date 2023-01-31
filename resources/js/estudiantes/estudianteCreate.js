var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var comboGrados = document.getElementById("grado");
var comboCursos = document.getElementById("curso");
var comboEmpresas = document.getElementById("empresa");
var comboTutorEmpresa = document.getElementById("tutorE");
var comboTutorAcademico = document.getElementById("tutorA");
window.onload = function () {
    var tutor = pedirTutores();
    tutor.then((data) => {
        console.log(data.data);
        comboTutorAcademico.innerHTML = "<option selected disabled value='seleccionar'>Tutor empresa</option>";
        data.data.forEach(function mostrar(element) {
            if (element.tipo == 'tutor_academico') {
                comboTutorAcademico.innerHTML += "<option id='" + element.id + "'>" + element.nombre + "</option>";
            }
            if (element.tipo == 'tutor_empresa') {
                comboTutorEmpresa.innerHTML += "<option id='" + element.id + "'>" + element.nombre + "</option>";
            }
        });
    });
    var empresas = pedirEmpresas();
    empresas.then((data) => {
        console.log(data.data);
        comboEmpresas.innerHTML = "<option selected disabled value='seleccionar'>Empresa</option>";
        data.data.forEach(function mostrar(element) {
            comboEmpresas.innerHTML += "<option id='" + element.id + "'>" + element.nombre + "</option>";
        });
    });
    var grados = pedirGrados();
    grados.then((data) => {
        console.log(data.data);
        comboGrados.innerHTML = "<option selected disabled value='seleccionar'>Grado</option>";
        data.data.forEach(function mostrar(element) {
            comboGrados.innerHTML += "<option id='" + element.id + "'>" + element.nombre + "</option>";
        });
    });
    var cursos = pedirCursos();
    cursos.then((data) => {
        console.log(data.data);
        comboCursos.innerHTML = "<option selected disabled value='seleccionar'>Curso</option>";
        data.data.forEach(function mostrar(element) {
            comboCursos.innerHTML += "<option id='" + element.id + "'>" + element.nombre + "</option>";
        });
    });
};
function pedirTutores() {
    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("http://localhost/personas/index", {
            method: "GET",
        });
        let result = yield response.json();
        return result;
    });
}
function pedirEmpresas() {
    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("http://localhost/empresas/index", {
            method: "GET",
        });
        let result = yield response.json();
        return result;
    });
}
function pedirCursos() {
    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("http://localhost/cursos/index", {
            method: "GET",
        });
        let result = yield response.json();
        return result;
    });
}
function pedirGrados() {
    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("http://localhost/grados/index", {
            method: "GET",
        });
        let result = yield response.json();
        return result;
    });
}
