import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/componentes/btnValidar.js',
                'resources/js/componentes/btnValidarEmpresa.js',
                'resources/js/formularios/llenarCombos.js',
                'resources/js/cambiarTutores.js',
                'resources/js/buscarEstudiantes.js',
                'resources/js/filtrarDiarios.js',
                'resources/js/filtrarReuniones.js',
                'resources/js/calcularMediaNotas.js',
                'resources/js/detalleEstudiante.js',
                'resources/js/empresas.js',
                'resources/js/funciones/validarDatosGrado.js',
                'resources/js/reuniones_script.js',
                'resources/js/tutorAcademico.js',
                'resources/js/buscarEstudiantesTutor.js',
                'resources/js/tutorEmpresa.js',


            ],
            refresh: true,
        }),
    ],
});
