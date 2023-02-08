<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Grado;
use App\Models\GradoCoordinadores;
use App\Models\Persona;
use Illuminate\Database\Seeder;

class GradosCursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Grado::factory(5)->create();

        Grado::all()->each(function ($grado) {
            Curso::factory(5)->create([
                'id_grado' => $grado->id,
            ]);
            $id_coordinador = (Persona::where('tipo', 'tutor_academico')->get()->random()->id);
            //si el coordinador ya esta asignado a otro grado, no se le asigna a este
            if (Grado::where('id_coordinador', $id_coordinador)->count() == 0) {
                $grado->id_coordinador = $id_coordinador;
                $grado->save();
            }
        });

}
}
