<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Mi Perfil
        </h2>
    </x-slot>

    <div class="profile-container">
        <!-- Avatar e información del usuario -->
        <div class="profile-card">
            <div class="profile-card-body">
                <div class="profile-avatar">
                    <div class="profile-avatar-circle">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>
                    <div class="profile-avatar-info">
                        <h4>{{ Auth::user()->name }}</h4>
                        <p>{{ Auth::user()->email }}</p>
                        <p style="font-size: 0.75rem; color: #0047AB;">Administrador del Sistema Cultural</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grid de 2 columnas para información y contraseña -->
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

            <!-- Cambiar contraseña -->
            <div class="profile-card">
                <div class="profile-card-header">
                    <h3>🔒 Actualizar Contraseña</h3>
                </div>
                <div class="profile-card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>

        <!-- Eliminar cuenta (fila completa) -->
        <div class="profile-card">
            <div class="profile-card-header">
                <h3>⚠️ Zona de Peligro</h3>
            </div>
            <div class="profile-card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>