<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $obra->titulo }} - Obra Cultural Salvadoreña</title>
    <style>
        body {
            font-family: 'DejaVu Sans', 'Helvetica', 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            color: #1e3a8a;
            background: white;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
        }
        
        .header {
            text-align: center;
            border-bottom: 3px solid #2563eb;
            padding-bottom: 20px;
            margin-bottom: 25px;
        }
        
        .header h1 {
            color: #1e3a8a;
            margin: 0;
            font-size: 26px;
        }
        
        .header p {
            color: #3b82f6;
            margin: 5px 0 0;
            font-size: 12px;
        }
        
        .logo-cultura {
            font-size: 48px;
            margin-bottom: 10px;
        }
        
        .titulo-obra {
            color: #2563eb;
            font-size: 22px;
            text-align: center;
            margin: 20px 0 15px;
            padding-bottom: 10px;
            border-bottom: 2px dashed #bfdbfe;
        }
        
        .contenido-principal {
            display: flex;
            gap: 25px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }
        
        .imagen-section {
            flex: 1;
            min-width: 250px;
            text-align: center;
        }
        
        .imagen-obra {
            width: 100%;
            max-width: 300px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border: 1px solid #bfdbfe;
        }
        
        .sin-imagen {
            width: 100%;
            max-width: 300px;
            height: 300px;
            background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 80px;
            border-radius: 8px;
            color: #2563eb;
        }
        
        .info-section {
            flex: 1;
            background-color: #eff6ff;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #2563eb;
        }
        
        .info-row {
            margin-bottom: 15px;
            line-height: 1.5;
            border-bottom: 1px solid #bfdbfe;
            padding-bottom: 8px;
        }
        
        .label {
            font-weight: bold;
            color: #1e3a8a;
            display: inline-block;
            min-width: 100px;
            font-size: 12px;
        }
        
        .value {
            color: #1e293b;
            font-size: 12px;
        }
        
        .descripcion {
            background-color: #f8fafc;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border: 1px solid #e2e8f0;
        }
        
        .descripcion h3 {
            color: #2563eb;
            margin-top: 0;
            font-size: 16px;
            border-left: 3px solid #2563eb;
            padding-left: 10px;
        }
        
        .descripcion p {
            color: #334155;
            line-height: 1.6;
            font-size: 12px;
            text-align: justify;
        }
        
        .footer-info {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #bfdbfe;
            font-size: 10px;
            color: #64748b;
            display: flex;
            justify-content: space-between;
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
            padding: 8px;
            background: white;
        }
        
        .tipo-badge {
            display: inline-block;
            background-color: #2563eb;
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            margin-bottom: 15px;
        }
        
        .codigo-verificacion {
            background-color: #f1f5f9;
            padding: 8px;
            border-radius: 4px;
            font-family: monospace;
            font-size: 9px;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo-cultura">🇸🇻</div>
            <h1>Patrimonio Cultural de El Salvador</h1>
            <p>Ficha Técnica de Obra Cultural</p>
        </div>
        
        <div style="text-align: center;">
            <span class="tipo-badge">
                {{ ucfirst($obra->tipo ?? 'Obra Cultural') }}
            </span>
        </div>
        
        <div class="titulo-obra">
            {{ $obra->titulo }}
        </div>
        
        <div class="contenido-principal">
            <div class="imagen-section">
                @if($obra->imagen && file_exists(public_path('storage/' . $obra->imagen)))
                    <img src="{{ public_path('storage/' . $obra->imagen) }}" class="imagen-obra" alt="{{ $obra->titulo }}">
                @else
                    <div class="sin-imagen">
                        
                    </div>
                @endif
            </div>
            
            <div class="info-section">
                <div class="info-row">
                    <span class="label">👤 Autor/Creador:</span>
                    <span class="value">{{ $obra->autor ?? 'Anónimo' }}</span>
                </div>
                
                <div class="info-row">
                    <span class="label">📅 Fecha de creación:</span>
                    <span class="value">{{ $obra->fecha ? \Carbon\Carbon::parse($obra->fecha)->format('d/m/Y') : 'No especificada' }}</span>
                </div>
                
                <div class="info-row">
                    <span class="label">🏷️ Tipo de obra:</span>
                    <span class="value">{{ ucfirst($obra->tipo ?? 'No especificado') }}</span>
                </div>
                
                <div class="info-row">
                    <span class="label">🆔 ID de registro:</span>
                    <span class="value">OBRA-{{ str_pad($obra->id, 6, '0', STR_PAD_LEFT) }}</span>
                </div>
                
                <div class="info-row">
                    <span class="label">📅 Registrado el:</span>
                    <span class="value">{{ $obra->created_at->format('d/m/Y H:i:s') }}</span>
                </div>
                
                <div class="info-row">
                    <span class="label">✍️ Registrado por:</span>
                    <span class="value">{{ $obra->user ? $obra->user->name : 'Sistema' }}</span>
                </div>
            </div>
        </div>
        
        <div class="descripcion">
            <h3>📖 Descripción de la obra</h3>
            <p>{{ $obra->descripcion ?? 'Sin descripción disponible' }}</p>
        </div>
        
        <div class="footer-info">
            <div>Documento oficial de registro cultural</div>
            <div>{{ date('Y') }} - Ministerio de Cultura</div>
        </div>
        
        <div class="codigo-verificacion">
            Código de verificación: {{ md5($obra->id . $obra->created_at . $obra->titulo) }}
        </div>
    </div>
    
    <div class="footer">
        <p>© {{ date('Y') }} - Sistema de Gestión Cultural de El Salvador | Este documento es una representación digital de la obra registrada</p>
    </div>
</body>
</html>