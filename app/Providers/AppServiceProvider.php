<?php

namespace App\Providers;

use App\View\Composers\SidebarComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
    /*  public function boot(): void
    {
        View::composer('layouts.admin',SidebarComposer::class);
    } */

    //cambio realizado para probar en raiway

    public function boot(): void
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        View::composer('layouts.admin', SidebarComposer::class);
    }
}
