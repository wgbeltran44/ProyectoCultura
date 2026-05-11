<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;



class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $frases = [
            'El Salvador es tierra de volcanes, pupusas y tradición viva.',
            'El Lago de Coatepeque es de origen volcánico.',
            'Las pupusas son patrimonio cultural salvadoreño.',
            'El Salvador es conocido como el Valle de las Hamacas.',
            'La cultura salvadoreña mezcla raíces indígenas y españolas.',
        ];

        View::share('frase', $frases[array_rand($frases)]);
        Schema::defaultStringLength(191);
    }
}