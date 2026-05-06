@extends('layouts.app')

@section('content')
<div class="tradiciones-container">
    
    <!-- Hero -->
    <div class="tradiciones-hero">
        <h1>🎉 Cultura y Tradiciones Salvadoreñas</h1>
        <p>Las tradiciones de El Salvador representan siglos de historia, mezcla indígena, colonial y moderna que siguen vivas en cada comunidad.</p>
    </div>

    <!-- Imagen principal -->
    <div class="tradiciones-imagen">
        <img src="{{ asset('images/tradiciones.jpg') }}" alt="Tradiciones de El Salvador">
        <p>Las celebraciones culturales son parte esencial de la identidad salvadoreña, transmitidas de generación en generación.</p>
    </div>

    <!-- Grid de tradiciones -->
    <div class="tradiciones-grid">
        <div class="tradicion-card">
            <h3>🎊 Fiestas Patronales</h3>
            <p>Son celebraciones realizadas en cada municipio en honor a su santo patrono. Incluyen desfiles, ferias, música en vivo, juegos mecánicos y eventos religiosos.</p>
        </div>

        <div class="tradicion-card">
            <h3>✝ Semana Santa</h3>
            <p>Una de las tradiciones más importantes del país. Se realizan procesiones solemnes y las famosas alfombras de aserrín colorido.</p>
        </div>

        <div class="tradicion-card">
            <h3>💃 Danzas Folclóricas</h3>
            <p>Expresiones culturales como el Torito Pinto, danzas indígenas y representaciones teatrales populares.</p>
        </div>

        <div class="tradicion-card">
            <h3>🏡 Costumbres Populares</h3>
            <p>Incluyen celebraciones comunitarias, juegos tradicionales, gastronomía local en festividades.</p>
        </div>
    </div>

    <!-- Highlight -->
    <div class="tradiciones-highlight">
        <h3>📌 Importancia Cultural</h3>
        <p>Preservan la identidad nacional salvadoreña, fortalecen la unión entre comunidades, transmiten historia y valores culturales, e impulsan el turismo cultural en el país.</p>
    </div>

    <!-- Botón -->
    <a href="{{ route('dashboard') }}" class="tradiciones-back">← Volver al Dashboard</a>

</div>
@endsection