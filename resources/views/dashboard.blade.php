@extends('layouts.app')

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- HEADER MANUAL (ANTES ERA SLOT) -->
        <div>
            <h2 class="font-semibold text-xl text-slate-800 leading-tight">
                Panel de Control - Cultura Salvadoreña
            </h2>
        </div>

        <!-- Bienvenida -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-200">
            <div class="p-6 text-slate-900">
                <h3 class="text-lg font-semibold text-blue-600 mb-2">
                    ¡Bienvenido al Sistema Cultural!
                </h3>
                <p>Explora y gestiona el rico patrimonio cultural de El Salvador.</p>
            </div>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Tradiciones -->
            <a href="{{ route('tradiciones') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-200 hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-slate-900">Tradiciones</h4>
                            <p class="text-slate-600 text-sm">Gestiona festividades y costumbres</p>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Gastronomía -->
            <a href="{{ route('gastronomia') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-200 hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-slate-900">Gastronomía</h4>
                            <p class="text-slate-600 text-sm">Recetas y platillos típicos</p>
                        </div>
                    </div>
                </div>
            </a>

            <!-- Turismo -->
            <a href="{{ route('turismo') }}" class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-200 hover:shadow-md transition-shadow">
                <div class="p-6">
                    <div class="flex items-center">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-slate-900">Turismo</h4>
                            <p class="text-slate-600 text-sm">Sitios históricos y culturales</p>
                        </div>
                    </div>
                </div>
            </a>

        </div>

        <!-- Secciones -->
        <div id="tradiciones" class="bg-white shadow-sm rounded-lg border border-slate-200">
            <div class="p-6 text-slate-900">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">Tradiciones</h3>
                <p class="mb-4">Aquí puedes gestionar las festividades y costumbres tradicionales de El Salvador.</p>
            </div>
        </div>

        <div id="gastronomia" class="bg-white shadow-sm rounded-lg border border-slate-200">
            <div class="p-6 text-slate-900">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">Gastronomía</h3>
                <p class="mb-4">Descubre y gestiona las recetas y platillos típicos salvadoreños.</p>
            </div>
        </div>

        <div id="turismo" class="bg-white shadow-sm rounded-lg border border-slate-200">
            <div class="p-6 text-slate-900">
                <h3 class="text-xl font-semibold text-blue-600 mb-4">Turismo</h3>
                <p class="mb-4">Conoce los sitios históricos y culturales más importantes de El Salvador.</p>
            </div>
        </div>

    </div>
</div>

@endsection