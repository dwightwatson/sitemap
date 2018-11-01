<?php

namespace Watson\Sitemap\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;

class InstallCommand extends Command
{
    use DetectsApplicationNamespace;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'sitemap:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the sitemap service provider';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Publishing sitemap service provider...');
        $this->callSilent('vendor:publish', ['--tag' => 'sitemap']);

        $this->registerSitemapServiceProvider();

        $this->info('Sitemap scaffolding installed successfully.');
    }

    /**
     * Register the Sitemap service provider in the application configuration file.
     *
     * @return void
     */
    protected function registerSitemapServiceProvider()
    {
        $namespace = str_replace_last('\\', '', $this->getAppNamespace());

        $appConfig = file_get_contents(config_path('app.php'));

        if (Str::contains($appConfig, $namespace."\\Providers\\SitemapServiceProvider::class")) {
            return;
        }

        file_put_contents(config_path('app.php'), str_replace(
            "{$namespace}\\Providers\RouteServiceProvider::class,".PHP_EOL,
            "{$namespace}\\Providers\RouteServiceProvider::class,".PHP_EOL."        {$namespace}\Providers\SitemapServiceProvider::class,".PHP_EOL,
            $appConfig
        ));

        file_put_contents(app_path('Providers/SitemapServiceProvider.php'), str_replace(
            "namespace App\Providers;",
            "namespace {$namespace}\Providers;",
            file_get_contents(app_path('Providers/SitemapServiceProvider.php'))
        ));
    }
}
