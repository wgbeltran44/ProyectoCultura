<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-slate-50">

            @include('layouts.navigation')

            <!-- 🇸🇻 BLOQUE CULTURAL (NUEVO - NO AFECTA DISEÑO) -->
            <div class="bg-blue-50 border-b border-blue-200 text-blue-900 px-4 py-3 text-sm">
                <div class="max-w-7xl mx-auto flex items-center justify-between">

                    <div>
                        🇸🇻 <strong>Cultura salvadoreña del día:</strong>
                        {{ $frase ?? 'El Salvador es tierra de volcanes, pupusas y tradición viva.' }}
                    </div>

                    <div class="hidden sm:block text-xs opacity-70">
                        ProyectoCultura • Identidad y patrimonio nacional
                    </div>

                </div>
            </div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow-sm border-b border-slate-200">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

        </div>
    </body>
</html>