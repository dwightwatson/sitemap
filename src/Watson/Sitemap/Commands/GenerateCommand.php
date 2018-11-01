<?php

namespace Watson\Sitemap\Commands;

use Watson\Sitemap\Cache;
use Illuminate\Console\Command;
use Watson\Sitemap\RendererCache;

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
     * The sitemap cache.
     *
     * @var \Watson\Sitemap\Cache
     */
    protected $cache;

    /**
     * Create a new command instance.
     *
     * @param  \Watson\Sitemap\Cache  $cache
     * @return void
     */
    public function __construct(Cache $cache)
    {
        parent::__construct();

        $this->cache = $cache;
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
