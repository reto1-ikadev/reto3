<?php

namespace Database\Seeders;

use App\Models\Grado;
use App\Models\Persona;
use App\Models\TutorAcademico;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;


class TutoresAcademicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Persona::factory(20)->tutor_academico()->create();
        Persona::where('tipo', 'tutor_academico')->get()->each(function ($persona) {
            User::factory()->create([
                'id_persona' => $persona->id,
            ]);
            $tutor_academico = new TutorAcademico();
            $tutor_academico->id_tutor_academico = $persona->id;
            $tutor_academico->telefono_academico = fake()->phoneNumber;
            $tutor_academico->save();
        });
    }
}
