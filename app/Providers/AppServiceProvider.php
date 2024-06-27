<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
{
    // Pour vérifier si le client est connecté
    Blade::if('client', function () {
        return Auth::guard('client')->check();
    });

    // Pour vérifier si le vendeur est connecté
    Blade::if('vendeur', function () {
        return Auth::guard('vendeur')->check();
    });
      // Pour vérifier si le vendeur est connecté
      Blade::if('admin', function () {
        return Auth::guard('admin')->check();
    });
}
}