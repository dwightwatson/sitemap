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
    protected $description = 'Install the sitemap generator command';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'sitemap']);
    }
}
