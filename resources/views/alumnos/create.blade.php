@extends('layouts.app')

@section('content')
<h1>Crear Alumno</h1>
<form action="{{ route('alumnos.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
    </div>
    <div class="form-group">
        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" id="apellido" class="form-control">
    </div>
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control">
    </div>
    <div class="form-group">
        <label for="dni">DNI</label>
        <input type="number" name="dni" id="dni" class="form-control" min="10000000" max="99999999">

    </div>
    <div class="form-group">
        <label for="activo">Activo</label>
        <select name="activo" id="activo" class="form-control">
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="curso_id">Curso</label>
        <select name="curso_id" id="curso_id" class="form-control">
            <option value="" disabled selected>Seleccione un curso</option>
            @foreach ($cursos as $curso)
            <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Guardar</button>
</form>
@endsection

@section('scripts')
<script>
    document.getElementById('fecha_nacimiento').addEventListener('change', function() {
        let date = new Date(this.value);
        let day = String(date.getDate()).padStart(2, '0');
        let month = String(date.getMonth() + 1).padStart(2, '0');
        let year = date.getFullYear();
        this.value = `${month}-${day}-${year}`; // Formato mes-día-año para ser procesado
    });
</script>
    
@endsection