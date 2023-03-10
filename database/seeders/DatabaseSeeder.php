<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Persona;
use App\Models\TutorAcademico;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            TutoresAcademicosSeeder::class
        ]);
        $this->call([
            TutorEmpresaSeeder::class
        ]);
        $this->call([
            GradosCursoSeeder::class
        ]);
        $this->call([
            AlumnosSeeder::class
        ]);
        $this->call([
            AnosAcademicosSeeder::class
        ]);
    }
}
