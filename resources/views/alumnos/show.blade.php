@extends('layouts.app')

@section('content')
    <h1>Alumno</h1>
    <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
    <p><strong>Apellido:</strong> {{ $alumno->apellido }}</p>
    <p><strong>Fecha de Nacimiento:</strong> {{ $alumno->fecha_nacimiento }}</p>
    <p><strong>DNI:</strong> {{ $alumno->dni }}</p>
    <p><strong>Activo:</strong> {{ $alumno->activo ? 'Sí' : 'No' }}</p>
    <p><strong>Email:</strong> {{ $alumno->email }}</p>
    <p><strong>Curso:</strong> {{ $alumno->cargo ? $alumno->curso->nombre : 'SIn' }}</p>
    <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Volver</a>
@endsection