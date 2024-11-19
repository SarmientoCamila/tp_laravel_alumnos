@extends('layouts.app')

@section('content')
    <h1>Cursos</h1>
    <a href="{{ route('cursos.create') }}" class="btn btn-primary mb-2">Crear Curso</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->nombre }}</td>
                    <td>
                        <a href="{{ route('cursos.show', $curso) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('cursos.edit', $curso) }}" class="btn btn-warning">Editar</a>
                        <!-- no lo eliminaremos, ya que puede estar relacionado con un alumno -->
                        <form action="{{ route('cursos.destroy', $curso) }}" method="POST" style="display: inline;"
                            onsubmit="return confirm('¿Estás seguro de eliminar este curso?');"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection