@extends('layouts.app')

@section('content')
    <h1>Alumnos</h1>
    <a href="{{ route('alumnos.create') }}" class="btn btn-primary mb-2">Crear Alumno</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>DNI</th>
                <th>Activo</th>
                <th>Email</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{ $alumno->nombre }}</td>
                    <td>{{ $alumno->apellido }}</td>
                    <td>{{ $alumno->fecha_nacimiento }}</td>
                    <td>{{ $alumno->dni }}</td>
                    <td>{{ $alumno->activo ? 'Sí' : 'No' }}</td>
                    <td>{{ $alumno->email }}</td>
                    <td>{{ $alumno->curso ? $alumno->curso->nombre : 'SIn' }}</td>
                    <td>
                        <a href="{{ route('alumnos.show', $alumno) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" style="display: inline;"
                            onsubmit="return confirm('¿Estás seguro de eliminar este alumno?');"
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