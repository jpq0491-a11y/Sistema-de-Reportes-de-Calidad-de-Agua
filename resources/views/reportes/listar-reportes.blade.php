<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Reportes</title>
</head>
<body>
    <h1>Mis Reportes</h1>

    <a href="{{ route('reporte.create') }}">Crear reporte</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Ubicación</th>
                <th>Folio</th>
                <th>Fecha Creación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reportes as $reporte)
                <tr>
                    <td>{{ $reporte->id }}</td>
                    <td>
                        {{ $reporte->user->name }} <br>
                        {{ $reporte->user->email }}
                    </td>
                    <td>{{ $reporte->ubicacion }}</td>
                    <td>{{ $reporte->folio }}</td>
                    <td>{{ $reporte->created_at }}</td>
                    <td>
                        <a href="{{ route('reporte.show', $reporte) }}">Ver</a>
                        <a href="{{ route('reporte.edit', $reporte) }}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
