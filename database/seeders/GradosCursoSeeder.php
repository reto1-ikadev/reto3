<?php

namespace Database\Seeders;

use App\Models\Curso;
use App\Models\Grado;
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
       //dont repeat the same grado
        Grado::factory(5)->create();

        //create cursos and asign one grado to each curso
        Grado::all()->each(function ($grado) {
            Curso::factory(5)->create([
                'id_grado' => $grado->id,
            ]);
        });
    }


}
