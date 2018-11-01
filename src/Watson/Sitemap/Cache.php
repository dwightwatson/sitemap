<?php

namespace Watson\Sitemap;

use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Support\Renderable;

class Cache implements Renderable
{
    /**
     * Laravel cache repository.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * Construct the renderer cache.
     *
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
     * @return void
     */
    public function __construct(Repository $cache)
    {
        $this->cache = $cache;

        $this->cacheMinutes = config('sitemap.cache.minutes');
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function __toString()
    {
        if ( ! $this->cacheEnabled()) {
            return $this->render();
        }

        if ($this->cacheExists()) {
            return $this->getCachedRender();
        }

        return $this->cache(
            $this->renderer->render()
        );
    }

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render()
    {
        //
    }

    protected function cache(Renderable $render)
    {
        $this->cache->put();
    }
}
