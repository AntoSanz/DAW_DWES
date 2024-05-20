@extends('layouts.plantilla')

@section('title', 'Home')
@section('content')
    <h1>Hello World!</h1>
    <a href="{{route('alumnos.listar')}}">Listado de alumnos</a>

@endsection