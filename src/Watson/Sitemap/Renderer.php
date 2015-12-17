<?php

namespace Watson\Sitemap;

use Illuminate\Contracts\Support\Renderable;

class Renderer implements Renderable
{
    /**
     * Whether the rendered sitemap shoudl be cached.
     *
     * @var bool
     */
    protected $cacheEnabled;

    /**
     * Length in minutes to cache the sitemap.
     *
     * @var int
     */
    protected $cacheMinutes;

    /**
     * Laravel cache repository.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * Laravel request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Construct the sitemap manager.
     *
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Cache $cache, Request $request)
    {
        $this->cache = $cache;
        $this->request = $request;

        $this->cacheEnabled = config('sitemap.cache_enabled');
        $this->cacheMinutes = config('sitemap.cache_minutes');
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        if (count($this->sitemaps)) {
            return $this->renderSitemapIndex();
        }

        return $this->renderSitemap();
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }
}