<?php

namespace Watson\Sitemap\Commands;

use Watson\Sitemap\Registrar;
use Illuminate\Console\Command;

abstract class GenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap(s)';

    /**
     * The sitemap registrar.
     *
     * @var \Watson\Sitemap\Registrar
     */
    protected $registrar;

    /**
     * Create a new command instance.
     *
     * @param  \Watson\Sitemap\Registar  $registrar
     * @return void
     */
    public function __construct(Registrar $registrar)
    {
        parent::__construct();

        $this->registrar = $registrar;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->register($this->registrar);

        $this->compiler->getIndex()
            ->generate();

        $this->compiler->getSitemaps()
            ->each(function ($sitemap) {
                $sitemap->generate();
            });
    }

    /**
     * Register the sitemap tags.
     *
     * @return void
     */
    abstract public function register(Registrar $sitemap): void;
}
