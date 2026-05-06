@extends('layouts.app')

@section('content')
<div class="profile-container">
    
    <!-- Header -->
    <div class="profile-header">
        <h1>Mi Perfil</h1>
        <p>Gestiona tu información personal y seguridad</p>
    </div>

    <!-- Avatar e información -->
    <div class="profile-avatar-card">
        <div class="profile-avatar-circle">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>
        <div class="profile-info">
            <h2>{{ Auth::user()->name }}</h2>
            <p>{{ Auth::user()->email }}</p>
            <span class="profile-badge">{{ ucfirst(Auth::user()->role) }}</span>
        </div>
    </div>

    <!-- Grid de formularios -->
    <div class="profile-grid">
        
        <!-- Información del perfil -->
        <div class="profile-card">
            <div class="profile-card-header">
                <h3>📝 Información del Perfil</h3>
            </div>
            <div class="profile-card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Actualizar contraseña -->
        <div class="profile-card">
            <div class="profile-card-header">
                <h3>🔒 Actualizar Contraseña</h3>
            </div>
            <div class="profile-card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

    </div>

    <!-- Zona de peligro -->
    <div class="danger-zone">
        <div class="profile-card-header">
            <h3>⚠️ Zona de Peligro</h3>
        </div>
        <div class="profile-card-body">
            @include('profile.partials.delete-user-form')
        </div>
    </div>

</div>
@endsection