<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Crear Reporte</h1>
    <form action="{{ route('reportes.store') }}" method="POST">
        @csrf
        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" id="ubicacion" required><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"></textarea><br>

        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" required><br>

        <button type="submit">Crear Reporte</button>
    </form>
</body>
</html>