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
}