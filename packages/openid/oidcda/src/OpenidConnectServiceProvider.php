<?php

namespace Oidcda;

use Illuminate\Support\ServiceProvider;

class OpenidConnectServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ .'/views', 'oidcda');
        $this->publishes([__DIR__ . '/config/OpenidConnect.php' => config_path('OpenidConnect.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__ . '/routes.php';
        $this->app->make('Oidcda\Controllers\OPController');
        $this->app->make('Oidcda\Controllers\RPController');
        $this->app->make('Oidcda\Controllers\AuthLocalController');
    }
}
