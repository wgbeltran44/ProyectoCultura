@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-12">
        <section class="hero space-y-6">
            <div class="bg-white rounded-3xl shadow-lg p-10 text-slate-900">
                <h2 class="text-4xl font-bold mb-4">Cultura de El Salvador</h2>
                <p class="text-lg text-slate-600">Descubre nuestras tradiciones, gastronomía, historia y patrimonio cultural.</p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <div class="card bg-white rounded-3xl shadow-lg p-6 border border-slate-200">
                    <h3 class="text-xl font-semibold mb-2">Tradiciones</h3>
                    <p class="text-slate-600">Festividades y costumbres que representan nuestra identidad.</p>
                </div>
                <div class="card bg-white rounded-3xl shadow-lg p-6 border border-slate-200">
                    <h3 class="text-xl font-semibold mb-2">Gastronomía</h3>
                    <p class="text-slate-600">Pupusas, tamales y otros platillos típicos salvadoreños.</p>
                </div>
                <div class="card bg-white rounded-3xl shadow-lg p-6 border border-slate-200">
                    <h3 class="text-xl font-semibold mb-2">Turismo Cultural</h3>
                    <p class="text-slate-600">Museos, sitios arqueológicos y lugares emblemáticos.</p>
                </div>
            </div>
        </section>
    </div>
@endsection