@extends('layouts.app')

@section('content')
    <h1>Curso</h1>
    <p><strong>Nombre:</strong> {{ $curso->nombre }}</p>
    <a href="{{ route('cursos.index') }}" class="btn btn-primary">Volver</a>
@endsection