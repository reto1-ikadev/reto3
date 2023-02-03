export function cargarCombos() {
    var oculto: HTMLInputElement = <HTMLInputElement>(
        document.getElementById("tipo")
    );
    switch (oculto.value) {
        case "alumno":
            var comboCursos: HTMLElement = <HTMLElement>(document.getElementById("curso"));
            var comboTutorEmpresa: HTMLElement = <HTMLElement>(document.getElementById("tutorE"));
            var comboTutorAcademico: HTMLElement = <HTMLElement>(document.getElementById("tutorA"));
            var comboEmpresas: HTMLElement = <HTMLElement>(document.getElementById("empresa"));
            var comboGrados: HTMLElement = <HTMLElement>(document.getElementById("grado"));

            /**
             * Tutor recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de los grados
             */
            var grados = pedirGrados();
            grados.then((data) => {
                console.log(data.data);
                comboGrados.innerHTML =
                    "<option selected disabled value='seleccionar'>Grado</option>";
                data.data.forEach(function mostrar(element: any) {
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
                data.data.forEach(function mostrar(element: any) {
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
                data.data.forEach(function mostrar(element: any) {
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
                data.data.forEach(function mostrar(element: any) {
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
                data.data.forEach(function mostrar(element: any) {
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
            var comboEmpresas: HTMLElement = <HTMLElement>(
                document.getElementById("empresa")
            );
            /**
             * Empresas recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de las empresas
             */
            var empresas = pedirEmpresas();
            empresas.then((data) => {
                console.log(data.data);
                comboEmpresas.innerHTML =
                    "<option selected disabled value='seleccionar'>Empresa</option>";
                data.data.forEach(function mostrar(element: any) {
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
            var comboCursos: HTMLElement = <HTMLElement>(
                document.getElementById("curso")
            );
            var comboEmpresas: HTMLElement = <HTMLElement>(
                document.getElementById("empresa") 
            );
            /**
             * Empresas recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de las empresas
             */
            var empresas = pedirEmpresas();
            empresas.then((data) => {
                console.log(data.data);
                comboEmpresas.innerHTML =
                    "<option selected disabled value='seleccionar'>Empresa</option>";
                data.data.forEach(function mostrar(element: any) {
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
                data.data.forEach(function mostrar(element: any) {
                    comboCursos.innerHTML +=
                        "<option id='" +
                        element.id +
                        "'>" +
                        element.nombre +
                        "</option>";
                });
            });
            var comboGrados: HTMLElement = <HTMLElement>(document.getElementById("grado"));

            /**
             * Tutor recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de los grados
             */
            var grados = pedirGrados();
            grados.then((data) => {
                console.log(data.data);
                comboGrados.innerHTML =
                    "<option selected disabled value='seleccionar'>Grado</option>";
                data.data.forEach(function mostrar(element: any) {
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
            var comboTutorAcademico: HTMLElement = <HTMLElement>(
                document.getElementById("tutorA")
            );
            var tipo = "tutor_academico";
            var tutor = pedirTutoresAcademicos(tipo);
            /**
             * Tutor recibe los datos que devuelve el servidor de la base de datos
             * y con esos datos se llenan los combos con los nombres de los tutores
             */
            tutor.then((data: any) => {
                comboTutorAcademico.innerHTML =
                    "<option selected disabled value='seleccionar'>Coordinador</option>";
                data.data.forEach(function mostrar(element: any) {
                    comboTutorAcademico.innerHTML +=
                        "<option id='" +
                        element.id +
                        "'>" +
                        element.nombre +
                        "</option>";
                }

            )}
            );
            break;
        default:
            break;
    }
}

/**
 * Funcion que envia una peticion de datos de personas al servidor
 * @returns devuelve un array con los datos de las personas que hay en la base de datos
 */
export async function pedirTutores() {
    let response = await fetch("http://localhost/personas/index", {
        method: "GET",
    });
    let result = await response.json();

    return result;
}
export async function pedirTutoresAcademicos(tipo: string) {
    let response = await fetch("http://localhost/personas/show/" + tipo, {
        method: "GET",
    });
    let result = await response.json();

    return result;
}
/**
 * Funcion que envia una peticion de datos de empresa al servidor
 * @returns Devuelve un array con las empresas que hay en la base de datos
 */
export async function pedirEmpresas() {
    console.log("antes del response");
    let response = await fetch("http://localhost/empresas/index/combo", {
        method: "GET",
    });
    let result = await response.json();
    console.log(result);

    return result;
}
/**
 * Funcion que envia una peticion de datos de cursos al servidor
 * @returns Devuelve un array con los cursos que hay en la base de datos
 */
export async function pedirCursos() {
    let response = await fetch("http://localhost/cursos/index", {
        method: "GET",
    });
    let result = await response.json();

    return result;
}
/**
 * Funcion que envia una peticion de datos de grados al servidor
 * @returns Devuelve un array con los grados que hay en la base de datos
 */
export async function pedirGrados() {
    let response = await fetch("http://localhost/grados/index", {
        method: "GET",
    });
    let result = await response.json();

    return result;
}
