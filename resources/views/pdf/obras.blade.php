<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Obras Culturales - El Salvador</title>
    <style>
        body {
            font-family: 'DejaVu Sans', 'Helvetica', 'Arial', sans-serif;
            margin: 15px;
            padding: 0;
            color: #1e3a8a;
        }
        
        .header {
            text-align: center;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        .header h1 {
            color: #1e3a8a;
            margin: 0;
            font-size: 24px;
        }
        
        .header h3 {
            color: #3b82f6;
            margin: 5px 0 0;
            font-size: 14px;
            font-weight: normal;
        }
        
        .fecha {
            text-align: right;
            font-size: 9px;
            color: #6b7280;
            margin-bottom: 15px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
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
            vertical-align: top;
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
            margin-top: 20px;
        }
        
        .badge {
            background-color: #dbeafe;
            color: #1e40af;
            padding: 2px 6px;
            border-radius: 10px;
            font-size: 9px;
            display: inline-block;
        }
        
        .descripcion {
            max-width: 200px;
            word-wrap: break-word;
        }
        
        .titulo-obra {
            font-weight: bold;
            color: #1e3a8a;
        }
        
        .miniatura {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
        }
        
        .sin-imagen {
            width: 50px;
            height: 50px;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            border-radius: 4px;
        }
        
        .page-break {
            page-break-after: avoid;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>🎨 Patrimonio Cultural de El Salvador</h1>
        <h3>Listado General de Obras Culturales</h3>
    </div>
    
    <div class="fecha">
        Generado: {{ date('d/m/Y H:i:s') }}
    </div>
    
     <table class="page-break">
        <thead>
            <tr>
                <th>Imagen</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Autor</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Creado por</th>
            </tr>
        </thead>
        <tbody>
            @forelse($obras as $obra)
            <tr>
                <td style="text-align: center;">
                    @if($obra->imagen)
                        <img src="{{ public_path('storage/' . $obra->imagen) }}" class="miniatura" style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        <div class="sin-imagen">🎨</div>
                    @endif
                </td>
                <td class="titulo-obra">{{ $obra->titulo }}</td>
                <td>
                    <span class="badge">
                        {{ ucfirst($obra->tipo ?? 'No especificado') }}
                    </span>
                </td>
                <td>{{ $obra->autor ?? 'Anónimo' }}</td>
                <td>{{ $obra->fecha ? \Carbon\Carbon::parse($obra->fecha)->format('d/m/Y') : 'No especificada' }}</td>
                <td class="descripcion">
                    {{ Str::limit($obra->descripcion, 80) }}
                </td>
                <td>{{ $obra->user ? $obra->user->name : 'Sistema' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center;">No hay obras culturales registradas</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    
    <div class="footer">
        <p>Total de obras: {{ $obras->count() }} | Sistema de Gestión Cultural - El Salvador | Ministerio de Cultura</p>
    </div>
</body>
</html>