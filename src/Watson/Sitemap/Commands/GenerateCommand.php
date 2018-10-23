<?php

namespace Watson\Sitemap\Commands;

use Illuminate\Console\Command;

class GenerateCommand extends Command
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
    protected $description = 'Pre-generate the sitemap.';

    /**
     * The renderer.
     *
     * @var \Watson\Sitemap\RendererCache
     */
    protected $renderer;

    /**
     * Create a new command instance.
     *
     * @param  \Watson\Sitemap\RendererCache  $renderer
     * @return void
     */
    public function __construct(RendererCache $renderer)
    {
        parent::__construct();

        $this->renderer = $renderer;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
