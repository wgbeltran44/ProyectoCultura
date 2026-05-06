@extends('layouts.app')

@section('content')
<div class="welcome-container">
    <!-- Hero Section -->
    <div class="hero-section">
        <h1 class="hero-title">Descubre la Cultura de El Salvador</h1>
        <p class="hero-subtitle">
            Explora nuestras tradiciones, gastronomía, historia y patrimonio cultural. 
            Un viaje único por la identidad salvadoreña.
        </p>
        <div class="hero-buttons">
            <a href="{{ route('register') }}" class="btn-primary">Comenzar a Explorar</a>
            <a href="#features" class="btn-secondary">Conocer Más</a>
        </div>
    </div>

    <!-- Sección de características -->
    <div id="features" class="features-grid">
        <div class="feature-card" onclick="location.href='{{ route('tradiciones') }}'">
            <div class="feature-icon">🎉</div>
            <h3>Tradiciones</h3>
            <p>Festividades, danzas y costumbres que representan nuestra identidad cultural.</p>
        </div>

        <div class="feature-card" onclick="location.href='{{ route('gastronomia') }}'">
            <div class="feature-icon">🌮</div>
            <h3>Gastronomía</h3>
            <p>Pupusas, tamales y otros platillos típicos que enamoran el paladar.</p>
        </div>

        <div class="feature-card" onclick="location.href='{{ route('turismo') }}'">
            <div class="feature-icon">🏝️</div>
            <h3>Turismo Cultural</h3>
            <p>Museos, sitios arqueológicos y lugares emblemáticos para visitar.</p>
        </div>

        <div class="feature-card" onclick="location.href='{{ route('obras.index') }}'">
            <div class="feature-icon">🎨</div>
            <h3>Obras Culturales</h3>
            <p>Arte, música, danza y expresiones artísticas de El Salvador.</p>
        </div>
    </div>

    <!-- Sección de estadísticas -->
    <div class="stats-section">
        <h2 style="font-size: 2rem; margin-bottom: 1rem;">El Salvador en Números</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <h4>25+</h4>
                <p>Obras Registradas</p>
            </div>
            <div class="stat-item">
                <h4>14</h4>
                <p>Departamentos</p>
            </div>
            <div class="stat-item">
                <h4>100+</h4>
                <p>Platillos Típicos</p>
            </div>
            <div class="stat-item">
                <h4>20+</h4>
                <p>Sitios Arqueológicos</p>
            </div>
        </div>
    </div>
</div>
@endsection