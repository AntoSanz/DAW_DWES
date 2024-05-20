@extends('layouts.plantilla')

@section('title', 'Editar Alumno')

@section('content')
    <p>{{$alumno}}</p>

    <div class="container">
        <h1>Editar Alumno</h1>
        <form action="{{route('alumnos.actualizar', $alumno)}}" method="post">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="dni" class="form-label">DNI:</label>
                <input type="text" class="form-control" id="dni" name="dni" required maxlength=9 value="{{$alumno->DNI}}">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required maxlength=50 value="{{$alumno->Nombre}}">
            </div>
            <div class="mb-3">
                <label for="apellido1" class="form-label">Apellido 1:</label>
                <input type="text" class="form-control" id="apellido1" name="apellido1" required maxlength=50 value="{{$alumno->Apellido1}}">
            </div>
            <div class="mb-3">
                <label for="apellido2" class="form-label">Apellido 2:</label>
                <input type="text" class="form-control" id="apellido2" name="apellido2" required maxlength=50 value="{{$alumno->Apellido2}}">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection
