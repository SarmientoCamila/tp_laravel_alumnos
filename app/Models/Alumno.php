<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model; // Importa el modelo base de Eloquent
use Illuminate\Database\Eloquent\Factories\HasFactory; // Importa HasFactory si quieres usar factories

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'fecha_nacimiento', 'dni', 'activo', 'email', 'curso_id'];

    /**
     * Relación con el modelo Curso
     */
    public function curso()
    {
        return $this->belongsTo(Curso::class); // un alumno pertenece a un curso
    }
}
