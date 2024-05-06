@extends('layouts.plantilla')

@section('title', 'Crear Alumno')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Alumno</h1>
        <form action="{{route('alumnos.guardar')}}" method="POST">
            {{-- TOKEN --}} @csrf
            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="text" class="form-control" id="dni" name="dni" required maxlength=9>
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required maxlength=50>
            </div>
            <div class="mb-3">
                <label for="apellido1" class="form-label">Apellido Paterno:</label>
                <input type="text" class="form-control" id="apellido1" name="apellido1" required maxlength=50>
            </div>
            <div class="mb-3">
                <label for="apellido2" class="form-label">Apellido Materno:</label>
                <input type="text" class="form-control" id="apellido2" name="apellido2" required maxlength=50>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
