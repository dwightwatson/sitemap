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
        $this->app->singleton(Registrar::class);
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../views', 'sitemap');

        $this->loadRoutesFrom(__DIR__.'/../../routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../stubs/SitemapServiceProvider.stub' => app_path('Providers/SitemapServiceProvider.php')
            ], 'sitemap');

            $this->commands(
                Commands\InstallCommand::class,
                Commands\GenerateCommand::class,
                Commands\SubmitCommand::class
            );
        }
    }
}
