<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sistema Cultural | El Salvador</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

    @if (Route::has('login'))
        <header>
            <div class="container nav-container">
                <h1>Sistema Cultural</h1>
                <nav>
                    @auth
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif
                    @endauth
                </nav>
            </div>
        </header>
    @endif

    <main class="container">
        <section class="hero">
            <h2>Cultura de El Salvador</h2>
            <p>Descubre nuestras tradiciones, gastronomía, historia y patrimonio cultural.</p>

            <div class="cards">
                <div class="card">
                    <h3>Tradiciones</h3>
                    <p>Festividades y costumbres que representan nuestra identidad.</p>
                </div>
                <div class="card">
                    <h3>Gastronomía</h3>
                    <p>Pupusas, tamales y otros platillos típicos salvadoreños.</p>
                </div>
                <div class="card">
                    <h3>Turismo Cultural</h3>
                    <p>Museos, sitios arqueológicos y lugares emblemáticos.</p>
                </div>
            </div>
        </section>
    </main>

</body>
</html>