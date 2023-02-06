<?php

namespace Database\Seeders;

use App\Models\AnosAcademicos;
use Faker\Provider\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnosAcademicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ano = new AnosAcademicos();
        $ano->fecha_inicio = '2023-09-01';
        $ano->fecha_fin = '2024-06-16';
        $ano->nombre = '2023-2024';
        $ano->save();

    }
}
