<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas Culturales - El Salvador</title>
    <style>
        body {
            font-family: 'DejaVu Sans', 'Helvetica', 'Arial', sans-serif;
            margin: 20px;
            padding: 0;
            color: #1e3a8a;
        }
        
        .header {
            text-align: center;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        
        .header h1 {
            color: #1e3a8a;
            margin: 0;
            font-size: 24px;
        }
        
        .header p {
            color: #3b82f6;
            margin: 5px 0 0;
            font-size: 12px;
        }
        
        .fecha {
            text-align: right;
            font-size: 10px;
            color: #6b7280;
            margin-bottom: 20px;
        }
        
        .stats-grid {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
            gap: 15px;
        }
        
        .stat-card {
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            flex: 1;
        }
        
        .stat-number {
            font-size: 28px;
            font-weight: bold;
            color: #2563eb;
        }
        
        .stat-label {
            font-size: 11px;
            color: #1e3a8a;
            margin-top: 5px;
        }
        
        h2 {
            color: #1e3a8a;
            font-size: 18px;
            margin-top: 25px;
            margin-bottom: 15px;
            border-left: 4px solid #2563eb;
            padding-left: 10px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 25px;
        }
        
        th {
            background-color: #2563eb;
            color: white;
            padding: 8px;
            text-align: left;
            font-size: 11px;
        }
        
        td {
            border: 1px solid #bfdbfe;
            padding: 8px;
            font-size: 10px;
            color: #1e293b;
        }
        
        tr:nth-child(even) {
            background-color: #eff6ff;
        }
        
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 9px;
            color: #6b7280;
            border-top: 1px solid #bfdbfe;
            padding-top: 8px;
        }
        
        .barra {
            background-color: #2563eb;
            height: 20px;
            border-radius: 4px;
            margin: 5px 0;
        }
        
        .barra-container {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📊 Estadísticas del Patrimonio Cultural</h1>
        <p>El Salvador - Sistema de Gestión Cultural</p>
    </div>
    
    <div class="fecha">
        Fecha de generación: {{ date('d/m/Y H:i:s') }}
    </div>
    
    <!-- Tarjetas de resumen -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">{{ $totales['total_obras'] }}</div>
            <div class="stat-label">Total de Obras</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $totales['con_imagen'] }}</div>
            <div class="stat-label">Obras con Imagen</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $totales['tipos_distintos'] }}</div>
            <div class="stat-label">Tipos de Obra</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $totales['autores_distintos'] }}</div>
            <div class="stat-label">Autores Registrados</div>
        </div>
    </div>
    
    <!-- Distribución por Tipo -->
    <h2>📌 Distribución por Tipo de Obra</h2>
    <table>
        <thead>
            <tr>
                <th>Tipo de Obra</th>
                <th>Cantidad</th>
                <th>Porcentaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obrasPorTipo as $tipo)
            <tr>
                <td>{{ ucfirst($tipo->tipo ?? 'No especificado') }}</td>
                <td>{{ $tipo->total }}</td>
                <td>
                    {{ round(($tipo->total / $totales['total_obras']) * 100, 1) }}%
                    <div class="barra-container">
                        <div class="barra" style="width: {{ ($tipo->total / $totales['total_obras']) * 100 }}%;"></div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Top Autores -->
    <h2>👨‍🎨 Top 10 Autores más Productivos</h2>
    <table>
        <thead>
            <tr>
                <th>Autor</th>
                <th>Cantidad de Obras</th>
                <th>Porcentaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obrasPorAutor as $autor)
            <tr>
                <td>{{ $autor->autor }}</td>
                <td>{{ $autor->total }}</td>
                <td>
                    {{ round(($autor->total / $totales['total_obras']) * 100, 1) }}%
                    <div class="barra-container">
                        <div class="barra" style="width: {{ ($autor->total / $totales['total_obras']) * 100 }}%; background-color: #10b981;"></div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <!-- Obras por Año -->
    <h2>📅 Obras Registradas por Año</h2>
    @if(count($obrasPorFecha) > 0)
    <table>
        <thead>
            <tr>
                <th>Año</th>
                <th>Cantidad de Obras</th>
                <th>Distribución</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obrasPorFecha as $año)
            <tr>
                <td>{{ $año->año }}</td>
                <td>{{ $año->total }}</td>
                <td>
                    <div class="barra-container">
                        <div class="barra" style="width: {{ ($año->total / $totales['total_obras']) * 100 }}%; background-color: #f59e0b;"></div>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No hay datos de obras por año disponibles</p>
    @endif
    
    <div class="footer">
        <p>© {{ date('Y') }} - Ministerio de Cultura de El Salvador | Documento generado por el Sistema de Gestión Cultural</p>
    </div>
</body>
</html>