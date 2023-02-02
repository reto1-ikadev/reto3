<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Persona;
use App\Models\TutorAcademico;
use App\Models\TutorEmpresa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Persona::factory(50)->create();
        //insert foreign key in alumno
        Persona::where('tipo', 'alumno')->get()->each(function ($persona) {
            User::factory()->create([
                'id_persona' => $persona->id,
            ]);

        $alumno = new Alumno();
        $alumno->id_alumno = $persona->id;
        $alumno->id_curso = Curso::all()->random()->id;
        $alumno->id_tutor_academico = Persona::all()->where('tipo', 'tutor_academico')->random()->id;
        $alumno->id_tutor_empresa = Persona::all()->where('tipo', 'tutor_empresa')->random()->id;
        $alumno->direccion = fake()->address;
        $alumno->save();
        });
    }
}
