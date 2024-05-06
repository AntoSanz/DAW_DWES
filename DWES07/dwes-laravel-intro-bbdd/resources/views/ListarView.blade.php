<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <title>Lista de Alumnos</title>
</head>

<body>
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
                    {{-- <li>{{ $alumno->Nombre }}</li> --}}
                @endforeach
            </tbody>
        </table>

    </ul>
</body>

</html>
