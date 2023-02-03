var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
export function cargarCombos() {
    var oculto = (document.getElementById("tipo"));
    switch (oculto.value) {
        case "alumno":
            var comboCursos = (document.getElementById("curso"));
            var comboTutorEmpresa = (document.getElementById("tutorE"));
            var comboTutorAcademico = (document.getElementById("tutorA"));
            var comboEmpresas = (document.getElementById("empresa"));
            var comboGrados = (document.getElementById("grado"));
            /**
             * Tutor recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de los grados
             */
            var grados = pedirGrados();
            grados.then((data) => {
                console.log(data.data);
                comboGrados.innerHTML =
                    "<option selected disabled value='seleccionar'>Grado</option>";
                data.data.forEach(function mostrar(element) {
                    comboGrados.innerHTML +=
                        "<option id='" +
                            element.id +
                            "'>" +
                            element.nombre +
                            "</option>";
                });
            });
            var cursos = pedirCursos();
            /**
             * cursos recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los cursos
             */
            cursos.then((data) => {
                console.log(data.data);
                comboCursos.innerHTML =
                    "<option selected disabled value='seleccionar'>Curso</option>";
                data.data.forEach(function mostrar(element) {
                    comboCursos.innerHTML +=
                        "<option id='" +
                            element.id +
                            "'>" +
                            element.nombre +
                            "</option>";
                });
            });
            var tipo = "tutor_academico";
            var tutor = pedirTutoresAcademicos(tipo);
            /**
             * Tutor recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de los tutores
             */
            tutor.then((data) => {
                console.log(data.data);
                comboTutorAcademico.innerHTML =
                    "<option selected disabled value='seleccionar'>Tutor Academico</option>";
                comboTutorEmpresa.innerHTML =
                    "<option selected disabled value='seleccionar'>Tutor empresa</option>";
                data.data.forEach(function mostrar(element) {
                    if (element.tipo == "tutor_academico") {
                        comboTutorAcademico.innerHTML +=
                            "<option id='" +
                                element.id +
                                "'>" +
                                element.nombre +
                                "</option>";
                    }
                });
            });
            var tipo = "tutor_empresa";
            var tutor = pedirTutoresAcademicos(tipo);
            /**
             * Tutor recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de los tutores
             */
            tutor.then((data) => {
                console.log(data.data);
                comboTutorEmpresa.innerHTML =
                    "<option selected disabled value='seleccionar'>Tutor empresa</option>";
                data.data.forEach(function mostrar(element) {
                    if (element.tipo == "tutor_empresa") {
                        comboTutorEmpresa.innerHTML +=
                            "<option id='" +
                                element.id +
                                "'>" +
                                element.nombre +
                                "</option>";
                    }
                });
            });
            /**
             * Empresas recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de las empresas
             */
            var empresas = pedirEmpresas();
            empresas.then((data) => {
                console.log(data.data);
                comboEmpresas.innerHTML =
                    "<option selected disabled value='seleccionar'>Empresa</option>";
                data.data.forEach(function mostrar(element) {
                    comboEmpresas.innerHTML +=
                        "<option id='" +
                            element.id +
                            "'>" +
                            element.nombre +
                            "</option>";
                });
            });
            break;
        case "tutor_empresa":
            var comboEmpresas = (document.getElementById("empresa"));
            /**
             * Empresas recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de las empresas
             */
            var empresas = pedirEmpresas();
            empresas.then((data) => {
                console.log(data.data);
                comboEmpresas.innerHTML =
                    "<option selected disabled value='seleccionar'>Empresa</option>";
                data.data.forEach(function mostrar(element) {
                    comboEmpresas.innerHTML +=
                        "<option id='" +
                            element.id +
                            "'>" +
                            element.nombre +
                            "</option>";
                });
            });
            break;
        case "filtros_estudiante":
            var comboCursos = (document.getElementById("curso"));
            var comboEmpresas = (document.getElementById("empresa"));
            /**
             * Empresas recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de las empresas
             */
            var empresas = pedirEmpresas();
            empresas.then((data) => {
                console.log(data.data);
                comboEmpresas.innerHTML =
                    "<option selected disabled value='seleccionar'>Empresa</option>";
                data.data.forEach(function mostrar(element) {
                    comboEmpresas.innerHTML +=
                        "<option id='" +
                            element.id +
                            "'>" +
                            element.nombre +
                            "</option>";
                });
            });
            var cursos = pedirCursos();
            /**
             * cursos recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los cursos
             */
            cursos.then((data) => {
                console.log(data.data);
                comboCursos.innerHTML =
                    "<option selected disabled value='seleccionar'>Curso</option>";
                data.data.forEach(function mostrar(element) {
                    comboCursos.innerHTML +=
                        "<option id='" +
                            element.id +
                            "'>" +
                            element.nombre +
                            "</option>";
                });
            });
            var comboGrados = (document.getElementById("grado"));
            /**
             * Tutor recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de los grados
             */
            var grados = pedirGrados();
            grados.then((data) => {
                console.log(data.data);
                comboGrados.innerHTML =
                    "<option selected disabled value='seleccionar'>Grado</option>";
                data.data.forEach(function mostrar(element) {
                    comboGrados.innerHTML +=
                        "<option id='" +
                            element.id +
                            "'>" +
                            element.nombre +
                            "</option>";
                });
            });
            break;
        case "grado":
            var comboTutorAcademico = (document.getElementById("tutorA"));
            var tipo = "tutor_academico";
            var tutor = pedirTutoresAcademicos(tipo);
            /**
             * Tutor recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de los tutores
             */
            tutor.then((data) => {
                comboTutorAcademico.innerHTML =
                    "<option selected disabled value='seleccionar'>Coordinador</option>";
                data.data.forEach(function mostrar(element) {
                    comboTutorAcademico.innerHTML +=
                        "<option id='" +
                            element.id +
                            "'>" +
                            element.nombre +
                            "</option>";
                });
            });
            break;
        default:
            break;
    }
}
/**
 * Funcion que envia una peticion de datos de personas al servidor
 * @returns devuelve un array con los datos de las personas que hay en la base de datos
 */
export function pedirTutores() {
    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("http://localhost/personas/index", {
            method: "GET",
        });
        let result = yield response.json();
        return result;
    });
}
export function pedirTutoresAcademicos(tipo) {
    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("http://localhost/personas/show/" + tipo, {
            method: "GET",
        });
        let result = yield response.json();
        return result;
    });
}
/**
 * Funcion que envia una peticion de datos de empresa al servidor
 * @returns Devuelve un array con las empresas que hay en la base de datos
 */
export function pedirEmpresas() {
    return __awaiter(this, void 0, void 0, function* () {
        console.log("antes del response");
        let response = yield fetch("http://localhost/empresas/index/combo", {
            method: "GET",
        });
        let result = yield response.json();
        console.log(result);
        return result;
    });
}
/**
 * Funcion que envia una peticion de datos de cursos al servidor
 * @returns Devuelve un array con los cursos que hay en la base de datos
 */
export function pedirCursos() {
    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("http://localhost/cursos/index", {
            method: "GET",
        });
        let result = yield response.json();
        return result;
    });
}
/**
 * Funcion que envia una peticion de datos de grados al servidor
 * @returns Devuelve un array con los grados que hay en la base de datos
 */
export function pedirGrados() {
    return __awaiter(this, void 0, void 0, function* () {
        let response = yield fetch("http://localhost/grados/index", {
            method: "GET",
        });
        let result = yield response.json();
        return result;
    });
}
