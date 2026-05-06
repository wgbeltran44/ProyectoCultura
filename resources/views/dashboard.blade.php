@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    
    <!-- Header -->
    <div class="dashboard-header">
        <h1>Panel de Control</h1>
        <p>Gestiona el patrimonio cultural de El Salvador</p>
    </div>

    <!-- Tarjeta de bienvenida -->
    <div class="welcome-card">
        <div>
            <h3>¡Bienvenido al Sistema Cultural!</h3>
            <p>Explora y gestiona el rico patrimonio cultural de El Salvador.</p>
        </div>
        <div class="welcome-icon">
            🇸🇻
        </div>
    </div>

    <!-- Grid de navegación -->
    <div class="dashboard-grid">
        <a href="{{ route('tradiciones') }}" class="nav-card">
            <div class="card-icon">🎉</div>
            <h4>Tradiciones</h4>
            <p>Festividades y costumbres que representan nuestra identidad</p>
        </a>

        <a href="{{ route('gastronomia') }}" class="nav-card">
            <div class="card-icon">🌮</div>
            <h4>Gastronomía</h4>
            <p>Recetas y platillos típicos salvadoreños</p>
        </a>

        <a href="{{ route('turismo') }}" class="nav-card">
            <div class="card-icon">🏝️</div>
            <h4>Turismo Cultural</h4>
            <p>Sitios históricos y lugares emblemáticos</p>
        </a>

        <a href="{{ route('obras.index') }}" class="nav-card">
            <div class="card-icon">🎨</div>
            <h4>Obras Culturales</h4>
            <p>Gestiona obras de arte, música y danza</p>
        </a>

        @auth
            @if(auth()->user()->role === 'admin')
                <a href="/admin/usuarios" class="nav-card">
                    <div class="card-icon">👥</div>
                    <h4>Gestión Usuarios</h4>
                    <p>Administra los usuarios del sistema</p>
                </a>
            @endif
        @endauth
    </div>

    <!-- Secciones informativas -->
    <div class="info-sections">
        <div class="info-card">
            <h3>📌 Tradiciones</h3>
            <p>Las tradiciones de El Salvador representan siglos de historia, mezcla indígena, colonial y moderna que siguen vivas en cada comunidad.</p>
            <a href="{{ route('tradiciones') }}" class="btn-dashboard">Explorar →</a>
        </div>

        <div class="info-card">
            <h3>🍽️ Gastronomía</h3>
            <p>La cocina salvadoreña es una mezcla de herencia indígena y española, reconocida por su sabor auténtico y tradición familiar.</p>
            <a href="{{ route('gastronomia') }}" class="btn-dashboard">Explorar →</a>
        </div>

        <div class="info-card">
            <h3>🏛️ Turismo Cultural</h3>
            <p>Desde playas hasta pueblos coloniales y volcanes, el país cuenta con una gran diversidad turística y cultural.</p>
            <a href="{{ route('turismo') }}" class="btn-dashboard">Explorar →</a>
        </div>
    </div>

</div>
@endsection