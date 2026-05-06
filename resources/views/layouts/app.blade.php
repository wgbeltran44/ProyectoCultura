<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ProyectoCultura') }} - Identidad y Patrimonio</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

    @vite([
        'resources/css/variables.css',
        'resources/css/base.css',
        'resources/css/navigation.css',
        'resources/css/welcome.css',
        'resources/css/dashboard.css',
        'resources/css/profile.css',
        'resources/css/tradiciones.css',
        'resources/css/gastronomia.css',
        'resources/css/turismo.css',
        'resources/css/admin-usuarios.css',
        'resources/css/obras-form.css',
        'resources/js/app.js'
    ])
</head>
<body>
    @include('layouts.navigation')

    <main>
        @yield('content')
    </main>
</body>
</html>