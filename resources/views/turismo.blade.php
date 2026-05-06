@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-slate-800 leading-tight">
        Turismo en El Salvador
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- HERO -->
            <div class="bg-gradient-to-r from-green-600 to-emerald-700 text-white rounded-xl p-8 shadow">
                <h1 class="text-3xl font-bold mb-2">🏝️ Turismo en El Salvador</h1>
                <p class="text-sm opacity-90">
                    El Salvador ofrece destinos naturales, históricos y culturales únicos en Centroamérica.
                </p>
            </div>

            <!-- IMAGEN PRINCIPAL -->
            <div class="bg-white rounded-xl shadow border overflow-hidden">
                <img src="{{ asset('images/turismo.jpg') }}"
                     class="w-full h-72 object-cover"
                     alt="Turismo en El Salvador">

                <div class="p-6">
                    <p class="text-slate-700">
                        Desde playas hasta pueblos coloniales y volcanes, el país cuenta con una gran diversidad turística.
                    </p>
                </div>
            </div>

            <!-- DESTINOS -->
            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-green-600 mb-2">🏛️ Suchitoto</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Ciudad colonial con calles empedradas, arte, cultura y vista al lago Suchitlán. Es uno de los destinos culturales más importantes del país.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-teal-600 mb-2">🌺 Ruta de las Flores</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Recorrido turístico que conecta varios pueblos llenos de color, gastronomía, café y naturaleza.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">🏄 El Tunco</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Playa famosa internacionalmente por el surf, vida nocturna y ambiente turístico juvenil.
                    </p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-emerald-600 mb-2">🌋 Volcanes</h3>
                    <p class="text-sm text-slate-700 leading-relaxed">
                        Destinos naturales como el volcán de Izalco y el Ilamatepec ofrecen senderismo y vistas impresionantes.
                    </p>
                </div>

            </div>

            <!-- IMPORTANCIA -->
            <div class="bg-white p-6 rounded-xl shadow border">
                <h3 class="text-xl font-bold text-slate-800 mb-4">📌 Importancia del Turismo</h3>

                <ul class="list-disc pl-6 text-slate-700 space-y-2 text-sm">
                    <li>Impulsa la economía nacional.</li>
                    <li>Promueve la cultura salvadoreña internacionalmente.</li>
                    <li>Genera empleo en comunidades locales.</li>
                    <li>Conserva áreas naturales y patrimonio histórico.</li>
                </ul>
            </div>

            <a href="{{ route('dashboard') }}"
               class="inline-block bg-green-600 text-white px-5 py-2 rounded-lg hover:bg-green-700 transition">
                ← Volver al Dashboard
            </a>

        </div>
    </div>
@endsection