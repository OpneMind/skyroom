<?php

namespace OpneMind\Skyroom;

use Illuminate\Support\ServiceProvider;

class SkyroomlaravelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'moladoust');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'moladoust');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/skyroom.php', 'skyroom');

        // Register the service the package provides.
        $this->app->singleton('skyroom', function ($app) {
            return new Skyroom(config('skyroom.api_url'));
        });

        $this->app->singleton('SkyroomGenerate', function ($app) {
            return new SkyroomGenerate();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['skyroom'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/skyroom.php' => config_path('skyroom.php'),
        ], 'skyroom.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/OpneMind'),
        ], 'skyroom.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/OpneMind'),
        ], 'skyroom.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/OpneMind'),
        ], 'skyroom.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
