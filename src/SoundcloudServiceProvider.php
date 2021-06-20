<?php

namespace Tolgatasci\Soundcloud;

use Illuminate\Support\ServiceProvider;

class SoundcloudServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'tolgatasci');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'tolgatasci');
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
        $this->mergeConfigFrom(__DIR__.'/../config/soundcloud.php', 'soundcloud');

        // Register the service the package provides.
        $this->app->singleton('soundcloud', function ($app) {
            return new Soundcloud;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['soundcloud'];
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
            __DIR__.'/../config/soundcloud.php' => config_path('soundcloud.php'),
        ], 'soundcloud.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/tolgatasci'),
        ], 'soundcloud.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/tolgatasci'),
        ], 'soundcloud.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/tolgatasci'),
        ], 'soundcloud.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
