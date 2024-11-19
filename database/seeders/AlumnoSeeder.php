<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno; # importar el modelo Alumno

class AlumnoSeeder extends Seeder
{
    public function run()
    {
        Alumno::create([
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'fecha_nacimiento' => '1990-01-01',
            'dni' => 12345678,
            'activo' => true,
            'email' => 'juan.perez@example.com',
            'curso_id' => 1
        ]);
        Alumno::create([
            'nombre' => 'Maria',
            'apellido' => 'Gomez',
            'fecha_nacimiento' => '1995-02-02',
            'dni' => 87654321,
            'activo' => false,
            'email' => 'maria.gomez@example.com',
            'curso_id' => 2
        ]);
        Alumno::create([
            'nombre' => 'Pedro',
            'apellido' => 'Gonzalez',
            'fecha_nacimiento' => '2000-03-03',
            'dni' => 11223344,
            'activo' => true,
            'email' => 'pedro.gonzalez@example.com',
            'curso_id' => 3
        ]);
    }
}
