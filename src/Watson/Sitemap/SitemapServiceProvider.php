<?php

namespace Watson\Sitemap;

use Illuminate\Support\ServiceProvider;

class SitemapServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

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

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../stubs/GenerateSitemapCommand.stub' => app_path('Console/Commands/GenerateSitemapCommand.php')
            ], 'sitemap');

            $this->commands(
                Commands\InstallCommand::class,
                Commands\SubmitCommand::class
            );
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Registrar::class
        ];
    }
}
