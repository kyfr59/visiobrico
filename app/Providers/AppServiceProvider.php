<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Jenssegers\Agent\Agent;

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
        $espace = '';
        if (request()->is('prestataire*')) {
            $espace = 'provider';
        } elseif (request()->is('demandeur*')) {
            $espace = 'requester';
        }
        View::share('espace', $espace);

        $agent = new Agent();
        View::share('isMobile', $agent->isMobile());
        View::share('isDesktop', $agent->isDesktop());
        View::share('isTablet', $agent->isTablet());
    }
}
