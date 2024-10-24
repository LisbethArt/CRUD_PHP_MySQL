<!DOCTYPE html>
<html>
<head>
    <title>Proyectos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header img {
            width: 100px;
            margin-right: 180px;
        }
        .header .date-time {
            text-align: right;
        }
        @page {
            size: letter;
            margin: 20mm;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('img/gobImg.png') }}" alt="GobLogo">
        <img src="{{ public_path('img/UFGImg.png') }}" alt="UFGLogo">
        <div class="date-time">
            {{ $currentDateTime }}
        </div>
    </div>
    <h2>Lista de Proyectos</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre del Proyecto</th>
                <th>Fuente de Fondos</th>
                <th>Monto Planificado</th>
                <th>Monto Patrocinado</th>
                <th>Monto Fondos Propios</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->nombreProyecto }}</td>
                    <td>{{ $proyecto->fuenteFondos }}</td>
                    <td>${{ number_format($proyecto->montoPlanificado, 2) }}</td>
                    <td>${{ number_format($proyecto->montoPatrocinado, 2) }}</td>
                    <td>${{ number_format($proyecto->montoFondosPropios, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>