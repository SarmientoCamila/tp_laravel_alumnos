<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso; # importar el modelo Curso


class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        Curso::create($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso creado correctamente');
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }

    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        $curso->update($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado correctamente');
    }

    public function destroy(Curso $curso)
    {
        // no lo eliminaremos, ya que puede estar relacionado con un alumno
        $curso->delete();
        return redirect()->route('cursos.index')->with('success', 'Curso eliminado correctamente');
    }
}