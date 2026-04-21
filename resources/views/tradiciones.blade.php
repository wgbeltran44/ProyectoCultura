<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">
            Tradiciones de El Salvador
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- HERO -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl p-8 shadow">
                <h1 class="text-3xl font-bold mb-2">🎉 Cultura y Tradiciones Salvadoreñas</h1>
                <p class="text-sm opacity-90">
                    Las tradiciones de El Salvador representan siglos de historia, mezcla indígena, colonial y moderna que siguen vivas en cada comunidad.
                </p>
            </div>

            <!-- IMAGEN PRINCIPAL -->
            <div class="bg-white rounded-xl shadow border overflow-hidden">
                <img src="{{ asset('images/tradiciones.jpg') }}"
                     class="w-full h-72 object-cover"
                     alt="Tradiciones de El Salvador">

                <div class="p-6">
                    <p class="text-slate-700">
                        Las celebraciones culturales son parte esencial de la identidad salvadoreña, transmitidas de generación en generación.
                    </p>
                </div>
            </div>

            <!-- GRID INFORMACIÓN -->
            <div class="grid md:grid-cols-2 gap-6">

                <!-- Fiestas Patronales -->
                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-blue-600 mb-2">🎊 Fiestas Patronales</h3>
                    <p class="text-slate-700 text-sm leading-relaxed">
                        Son celebraciones realizadas en cada municipio en honor a su santo patrono. Incluyen desfiles, ferias, música en vivo, juegos mecánicos y eventos religiosos.
                        Estas fiestas fortalecen la identidad local y la unión comunitaria.
                    </p>
                </div>

                <!-- Semana Santa -->
                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-indigo-600 mb-2">✝ Semana Santa</h3>
                    <p class="text-slate-700 text-sm leading-relaxed">
                        Una de las tradiciones más importantes del país. Se realizan procesiones solemnes y las famosas alfombras de aserrín colorido que representan escenas religiosas.
                    </p>
                </div>

                <!-- Danzas -->
                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-pink-600 mb-2">💃 Danzas Folclóricas</h3>
                    <p class="text-slate-700 text-sm leading-relaxed">
                        Expresiones culturales como el Torito Pinto, danzas indígenas y representaciones teatrales populares que cuentan historias ancestrales.
                    </p>
                </div>

                <!-- Costumbres -->
                <div class="bg-white p-6 rounded-xl shadow border hover:shadow-md transition">
                    <h3 class="text-lg font-bold text-green-600 mb-2">🏡 Costumbres Populares</h3>
                    <p class="text-slate-700 text-sm leading-relaxed">
                        Incluyen celebraciones comunitarias, juegos tradicionales, gastronomía local en festividades y prácticas transmitidas por generaciones.
                    </p>
                </div>

            </div>

            <!-- SECCIÓN EXTRA (EDUCATIVA) -->
            <div class="bg-white p-6 rounded-xl shadow border">
                <h3 class="text-xl font-bold text-slate-800 mb-4">📌 Importancia Cultural</h3>

                <ul class="list-disc pl-6 text-slate-700 space-y-2 text-sm">
                    <li>Preservan la identidad nacional salvadoreña.</li>
                    <li>Fortalecen la unión entre comunidades.</li>
                    <li>Transmiten historia y valores culturales.</li>
                    <li>Impulsan el turismo cultural en el país.</li>
                </ul>
            </div>

            <!-- BOTÓN -->
            <div>
                <a href="{{ route('dashboard') }}"
                   class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                    ← Volver al Dashboard
                </a>
            </div>

        </div>
    </div>
</x-app-layout>