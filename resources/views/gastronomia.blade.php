@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-slate-800 leading-tight">
        Gastronomía Salvadoreña
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- HERO -->
            <div class="bg-gradient-to-r from-orange-500 to-amber-600 text-white rounded-xl p-8 shadow">
                <h1 class="text-3xl font-bold mb-2">🌮 Gastronomía de El Salvador</h1>
                <p class="text-sm opacity-90">
                    La cocina salvadoreña es una mezcla de herencia indígena y española, reconocida por su sabor auténtico y tradición familiar.
                </p>
            </div>

            <!-- IMAGEN PRINCIPAL -->
            <div class="bg-white rounded-xl shadow border overflow-hidden">
                <img src="{{ asset('images/gastronomia.jpg') }}"
                     class="w-full h-72 object-cover"
                     alt="Gastronomía Salvadoreña">

                <div class="p-6">
                    <p class="text-slate-700">
                        La gastronomía salvadoreña es parte esencial de la cultura del país, presente en fiestas, reuniones familiares y celebraciones importantes.
                    </p>
                </div>
            </div>

            <!-- PLATOS PRINCIPALES -->
            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-orange-600 mb-2">🌽 Pupusas</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Consideradas el platillo nacional. Son tortillas gruesas de maíz o arroz rellenas de queso, frijoles, chicharrón o loroco.
                        Se sirven con curtido (repollo fermentado) y salsa de tomate.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-amber-600 mb-2">🥘 Yuca con Chicharrón</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Plato tradicional muy popular en ferias y fiestas. Incluye yuca cocida, chicharrón crujiente, curtido y salsa roja.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-yellow-600 mb-2">🌿 Tamales</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Preparados con masa de maíz rellena de carne, pollo o vegetales, envueltos en hojas de plátano.
                        Son típicos en celebraciones familiares.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-red-600 mb-2">🍹 Bebidas Típicas</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Incluyen horchata de morro, atol de elote, chilate y refrescos naturales elaborados con frutas tropicales.
                    </p>
                </div>

            </div>

            <!-- CULTURA GASTRONÓMICA -->
            <div class="bg-white p-6 rounded-xl shadow border">
                <h3 class="text-xl font-bold text-slate-800 mb-4">📌 Importancia Cultural</h3>

                <ul class="list-disc pl-6 text-slate-700 space-y-2 text-sm">
                    <li>Refleja la identidad histórica del país.</li>
                    <li>Es parte central de las celebraciones familiares.</li>
                    <li>Representa la mezcla cultural indígena y española.</li>
                    <li>Impulsa el turismo gastronómico en El Salvador.</li>
                </ul>
            </div>

            <a href="{{ route('dashboard') }}"
               class="inline-block bg-orange-600 text-white px-5 py-2 rounded-lg hover:bg-orange-700 transition">
                ← Volver al Dashboard
            </a>

        </div>
    </div>
@endsection