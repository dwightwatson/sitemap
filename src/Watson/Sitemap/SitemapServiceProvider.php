<?php

namespace Watson\Sitemap;

use Illuminate\Support\ServiceProvider;

class SitemapServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/config.php', 'sitemap');

        $this->commands(
            Commands\InstallCommand::class,
            Commands\SubmitSitemapCommand::class
        );
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'sitemap');

        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path('sitemap.php')
        ], 'config');

        if ( ! $this->app->routesAreCached()) {
            require __DIR__ . '/../../routes.php';
        }    
    }
}