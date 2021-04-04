<?php

namespace IO3x1\LaravelSettings\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

include __DIR__ .'/helpers.php';

class LaravelSettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-settings');
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-settings');
        $this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendors/3x1/laravel-settings'),
            __DIR__.'/../config/laravel-settings.php' => config_path('laravel-settings.php'),
        ]);
    }
}
