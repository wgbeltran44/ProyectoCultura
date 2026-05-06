@extends('layouts.app')

@section('content')
<div class="gastronomia-container">
    
    <!-- Hero -->
    <div class="gastronomia-hero">
        <h1>🌮 Gastronomía de El Salvador</h1>
        <p>La cocina salvadoreña es una mezcla de herencia indígena y española, reconocida por su sabor auténtico y tradición familiar.</p>
    </div>

    <!-- Imagen principal -->
    <div class="gastronomia-imagen">
        <img src="{{ asset('images/gastronomia.jpg') }}" alt="Gastronomía Salvadoreña">
        <p>La gastronomía salvadoreña es parte esencial de la cultura del país, presente en fiestas, reuniones familiares y celebraciones importantes.</p>
    </div>

    <!-- Grid de platos -->
    <div class="gastronomia-grid">
        <div class="plato-card">
            <h3>🌽 Pupusas</h3>
            <p>Consideradas el platillo nacional. Son tortillas gruesas de maíz o arroz rellenas de queso, frijoles, chicharrón o loroco. Se sirven con curtido y salsa de tomate.</p>
        </div>

        <div class="plato-card">
            <h3>🥘 Yuca con Chicharrón</h3>
            <p>Plato tradicional muy popular en ferias y fiestas. Incluye yuca cocida, chicharrón crujiente, curtido y salsa roja.</p>
        </div>

        <div class="plato-card">
            <h3>🌿 Tamales</h3>
            <p>Preparados con masa de maíz rellena de carne, pollo o vegetales, envueltos en hojas de plátano. Típicos en celebraciones familiares.</p>
        </div>

        <div class="plato-card">
            <h3>🍹 Bebidas Típicas</h3>
            <p>Incluyen horchata de morro, atol de elote, chilate y refrescos naturales elaborados con frutas tropicales.</p>
        </div>
    </div>

    <!-- Info box -->
    <div class="gastronomia-info-box">
        <h3>📌 Importancia Cultural</h3>
        <ul>
            <li>Refleja la identidad histórica del país.</li>
            <li>Es parte central de las celebraciones familiares.</li>
            <li>Representa la mezcla cultural indígena y española.</li>
            <li>Impulsa el turismo gastronómico en El Salvador.</li>
        </ul>
    </div>

    <!-- Botón -->
    <a href="{{ route('dashboard') }}" class="gastronomia-back">← Volver al Dashboard</a>

</div>
@endsection