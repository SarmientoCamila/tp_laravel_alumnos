<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // Agrega esta línea
use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Asegúrate de que HasFactory esté importado

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $fillable = ['nombre'];

    /**
     * Relación con el modelo Alumno
     */
    public function alumnos()
    {
        return $this->hasMany(Alumno::class); // un curso tiene muchos alumnos
    }
}
