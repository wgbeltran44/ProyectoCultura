<nav class="navbar" x-data="{ open: false }">
    <div class="navbar-container">
        <div class="navbar-content">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="navbar-logo">
                <svg viewBox="0 0 316 316" width="32" height="32" fill="white">
                    <path d="M305.8 81.125C305.77 80.995 305.69 80.885 305.65 80.755C305.56 80.525 305.49 80.285 305.37 80.075C305.29 79.935 305.17 79.815 305.07 79.685C304.94 79.515 304.83 79.325 304.68 79.175C304.55 79.045 304.39 78.955 304.25 78.845C304.09 78.715 303.95 78.575 303.77 78.475L251.32 48.275C249.97 47.495 248.31 47.495 246.96 48.275L194.51 78.475C194.33 78.575 194.19 78.725 194.03 78.845C193.89 78.955 193.73 79.045 193.6 79.175C193.45 79.325 193.34 79.515 193.21 79.685C193.11 79.815 192.99 79.935 192.91 80.075C192.79 80.285 192.71 80.525 192.63 80.755C192.58 80.875 192.51 80.995 192.48 81.125C192.38 81.495 192.33 81.875 192.33 82.265V139.625L148.62 164.795V52.575C148.62 52.185 148.57 51.805 148.47 51.435C148.44 51.305 148.36 51.195 148.32 51.065C148.23 50.835 148.16 50.595 148.04 50.385C147.96 50.245 147.84 50.125 147.74 49.995C147.61 49.825 147.5 49.635 147.35 49.485C147.22 49.355 147.06 49.265 146.92 49.155C146.76 49.025 146.62 48.885 146.44 48.785L93.99 18.585C92.64 17.805 90.98 17.805 89.63 18.585L37.18 48.785C37 48.885 36.86 49.035 36.7 49.155C36.56 49.265 36.4 49.355 36.27 49.485C36.12 49.635 36.01 49.825 35.88 49.995C35.78 50.125 35.66 50.245 35.58 50.385C35.46 50.595 35.38 50.835 35.3 51.065C35.25 51.185 35.18 51.305 35.15 51.435C35.05 51.805 35 52.185 35 52.575V232.235C35 233.795 35.84 235.245 37.19 236.025L142.1 296.425C142.33 296.555 142.58 296.635 142.82 296.725C142.93 296.765 143.04 296.835 143.16 296.865C143.53 296.965 143.9 297.015 144.28 297.015C144.66 297.015 145.03 296.965 145.4 296.865C145.5 296.835 145.59 296.775 145.69 296.745C145.95 296.655 146.21 296.565 146.45 296.435L251.36 236.035C252.72 235.255 253.55 233.815 253.55 232.245V174.885L303.81 145.945C305.17 145.165 306 143.725 306 142.155V82.265C305.95 81.875 305.89 81.495 305.8 81.125Z"/>
                </svg>
                <span class="logo-text">Proyecto<span>Cultura</span></span>
            </a>

            <!-- Links de navegación -->
            <div class="nav-links" :class="{ 'active': open }">
                <a href="{{ route('dashboard') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('obras.index') }}" class="nav-link">Obras</a>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="/admin/usuarios" class="nav-link">Gestión Usuarios</a>
                    @endif
                @endauth
            </div>

            <!-- Acciones derecha -->
            <div class="nav-actions" :class="{ 'active': open }">
                @auth
                    <div class="user-dropdown" x-data="{ open: false }">
                        <button @click="open = !open" class="user-btn">
                            {{ auth()->user()->name }} ▼
                        </button>
                        <div x-show="open" @click.away="open = false" class="dropdown-menu" style="display: none;">
                            <a href="{{ route('profile.edit') }}">Mi Perfil</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit">Cerrar Sesión</button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="btn-login">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn-register">Registrarse</a>
                @endguest
            </div>

            <!-- Botón menú móvil -->
            <button class="menu-toggle" @click="open = !open">
                ☰
            </button>
        </div>
    </div>
</nav>