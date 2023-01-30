<?php

namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\Persona;
use App\Models\TutorEmpresa;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class TutorEmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Persona::factory(5)->tutor_empresa()->create();
        //create empresas to add in tutor_empresa
        Empresa::factory(5)->create();
        Persona::where('tipo', 'tutor_empresa')->get()->each(function ($persona) {
            User::factory()->create([
                'id_persona' => $persona->id,
            ]);
            $tutor_empresa = new TutorEmpresa();
            $tutor_empresa->id_tutor_empresa = $persona->id;
            $tutor_empresa->id_empresa = Empresa::all()->random()->id;
            $tutor_empresa->departamento = 'Informatica';
            $tutor_empresa->save();
        });

    }
}
