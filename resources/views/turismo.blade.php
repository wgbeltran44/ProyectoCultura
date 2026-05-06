@extends('layouts.app')

@section('content')
<div class="turismo-container">
    
    <!-- Hero -->
    <div class="turismo-hero">
        <h1>🏝️ Turismo en El Salvador</h1>
        <p>El Salvador ofrece destinos naturales, históricos y culturales únicos en Centroamérica.</p>
    </div>

    <!-- Imagen principal -->
    <div class="turismo-imagen">
        <img src="{{ asset('images/turismo.jpg') }}" alt="Turismo en El Salvador">
        <p>Desde playas hasta pueblos coloniales y volcanes, el país cuenta con una gran diversidad turística y cultural.</p>
    </div>

    <!-- Grid destinos -->
    <div class="turismo-grid">
        <div class="destino-card">
            <h3>🏛️ Suchitoto</h3>
            <p>Ciudad colonial con calles empedradas, arte, cultura y vista al lago Suchitlán. Es uno de los destinos culturales más importantes del país.</p>
        </div>

        <div class="destino-card">
            <h3>🌺 Ruta de las Flores</h3>
            <p>Recorrido turístico que conecta varios pueblos llenos de color, gastronomía, café y naturaleza.</p>
        </div>

        <div class="destino-card">
            <h3>🏄 El Tunco</h3>
            <p>Playa famosa internacionalmente por el surf, vida nocturna y ambiente turístico juvenil.</p>
        </div>

        <div class="destino-card">
            <h3>🌋 Volcanes</h3>
            <p>Destinos naturales como el volcán de Izalco y el Ilamatepec ofrecen senderismo y vistas impresionantes.</p>
        </div>
    </div>

    <!-- Importancia -->
    <div class="turismo-importancia">
        <h3>📌 Importancia del Turismo</h3>
        <ul>
            <li>Impulsa la economía nacional.</li>
            <li>Promueve la cultura salvadoreña internacionalmente.</li>
            <li>Genera empleo en comunidades locales.</li>
            <li>Conserva áreas naturales y patrimonio histórico.</li>
        </ul>
    </div>

    <!-- Botón -->
    <a href="{{ route('dashboard') }}" class="turismo-back">← Volver al Dashboard</a>

</div>
@endsection