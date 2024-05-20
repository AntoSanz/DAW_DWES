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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <td>{{ $alumno->DNI }}</td>
                            <td>{{ $alumno->Nombre }}</td>
                            <td><a href="{{ route('alumnos.editar', ['dni' => $alumno->DNI]) }}">editar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </ul>
    </div>
    <div class="container">
        <a href="{{route('alumnos.crear')}}">crear alumno</a>
    </div>
@endsection
