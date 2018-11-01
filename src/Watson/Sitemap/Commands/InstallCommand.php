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
    protected $description = 'Install the sitemap service provider';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Sitemap service provider';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/../../../stubs/SitemapServiceProvider.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Providers';
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return 'SitemapServiceProvider';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }
}
