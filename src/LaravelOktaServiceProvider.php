<?php

namespace Jmurphy\LaravelOkta;

use Illuminate\Support\ServiceProvider;
use Jmurphy\LaravelOkta\Okta\ConfigRepository;

class LaravelOktaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-okta');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-okta');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-okta.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-okta'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-okta'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-okta'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laravel-okta');

        $this->app->bind(ConfigRepository::class, function ($app) {
            return new ConfigRepository(
                config('okta.baseUrl'),
                config('okta.apiKey')
            );
        });

        // Register the main class to use with the facade
        $this->app->singleton('laravel-okta', function () {
            return new LaravelOkta(
                '',
                ''
            );
        });
    }
}
