<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Curso;


class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all(); #Obtener todos los alumnos
        return view('alumnos.index', compact('alumnos')); #Enviar los alumnos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('alumnos.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all()); //Verifica los datos enviados. Inspecciona los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'dni' => 'required|digits:8|numeric',
            'email' => 'required|email|max:255|unique:alumnos,email',
            'activo' => 'required|boolean',
            'curso_id' => 'required|exists:cursos,id',
        ]); #valida todos los campos

        $request->validate([
            'fecha_nacimiento' => [
                'required',
                'date',
                function ($attribute, $value, $fail) {
                    if (strtotime($value) > time()) {
                        $fail('La fecha de nacimiento no puede ser una fecha futura.');
                    }
                },
            ],
        ]);


        Alumno::create($request->all()); #crea un nuevo alumno con los datos del request
        return redirect()->route('alumnos.index'); #redirige a la vista de alumnos
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno')); #Enviar el alumno a la vista
    }

    /**
     * Display the specified resource.
     */
    public function show_id(string $id)
    {
        $alumno = Alumno::find($id); #Obtener el alumno por id
        return view('alumnos.show', compact('alumno')); #Enviar el alumno a la vista
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_id(string $id)
    {
        $alumno = Alumno::find($id); #Obtener el alumno por id
        return view('alumnos.edit', compact('alumno')); #Enviar el alumno a la vista
    }
    public function edit(Alumno $alumno)
    {
        $cursos = Curso::all();
        return view('alumnos.edit', compact('alumno', 'cursos')); #Enviar el alumno a la vista
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required|date',
            'dni' => 'required|integer',
            'activo' => 'required|boolean',
            'email' => 'required|email',
            'curso_id' => 'required|exists:cursos,id',
        ]); #valida todos los campos

        $alumno = Alumno::find($id); #Obtener el alumno por id
        $alumno->update($request->all()); #actualiza el alumno con los datos del request
        return redirect()->route('alumnos.index'); #redirige a la vista de alumnos
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete(); # eliminar el alumno
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado correctamente'); #redirigir a la vista de alumnos
    }
}
