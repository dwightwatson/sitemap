<?php

namespace Watson\Sitemap\Commands;

use Illuminate\Console\GeneratorCommand;

class InstallCommand extends GeneratorCommand
{
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
    protected $description = 'Install the sitemap definitions service provider';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'../../stubs/SitemapServiceProvider.stub';
    }
}
