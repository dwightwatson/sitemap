<?php

namespace Watson\Sitemap;

use Illuminate\Contracts\Support\Renderable;

class Renderer implements Renderable
{
    /**
     * Google supports a maximum of 50,000 tags per page.
     *
     * @var int
     */
    const PER_PAGE = 50000;

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
        $this->request = $request;
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
