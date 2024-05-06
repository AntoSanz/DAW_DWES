@extends('layouts.plantilla')

@section('title', 'Listar Alumnos')

@section('content')
    <div class="container">
        <h1>Lista de Alumnos</h1>
        <ul>
            <table class="table">
                <thead>
                    <tr>
                        <th>DNI</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->DNI }}</td>
                            <td>{{ $alumno->Nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </ul>
    </div>
@endsection
