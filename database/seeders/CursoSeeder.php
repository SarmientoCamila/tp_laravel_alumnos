<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso; # importar el modelo Curso

class CursoSeeder extends Seeder
{
    public function run()
    {
        Curso::create(['nombre' => 'Primero']);
        Curso::create(['nombre' => 'Segundo']);
        Curso::create(['nombre' => 'Tercer']);
    }
}
