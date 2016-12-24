<?php namespace Watson\Sitemap;

use DateTime;
use Illuminate\Http\Request;
use Watson\Sitemap\Tags\Tag;
use Illuminate\Http\Response;
use Watson\Sitemap\Tags\ExpiredTag;
use Watson\Sitemap\Tags\MultilingualTag;
use Watson\Sitemap\Tags\Sitemap as SitemapTag;
use Illuminate\Contracts\Cache\Repository as Cache;

class Sitemap
{
    /**
     * Collection of sitemaps being used.
     *
     * @var array
     */
    protected $sitemaps = [];

    /**
     * Collection of tags being used in a sitemap.
     *
     * @var array
     */
    protected $tags = [];

    /**
     * Laravel cache repository.
     *
     * @var \Illuminate\Cache\Repository
     */
    protected $cache;

    /**
     * Laravel request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Create a new sitemap instance.
     *
     * @param  \Illuminate\Contracts\Cache\Repository  $cache
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Cache $cache, Request $request)
    {
        $this->cache = $cache;
        $this->request = $request;
    }

    /**
     * Add new sitemap to the sitemaps index.
     *
     * @param  \Watson\Sitemap\Tags\Sitemap|string  $location
     * @param  string  $lastModified
     * @return void
     */
    public function addSitemap($location, $lastModified = null)
    {
        $sitemap = $location instanceof SitemapTag ? $location : new SitemapTag($location, $lastModified);

        $this->sitemaps[] = $sitemap;
    }

    /**
     * Retrieve the array of sitemaps.
     *
     * @return array
     */
    public function getSitemaps()
    {
        return $this->sitemaps;
    }

    /**
     * Render an index of sitemaps.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ($cachedView = $this->getCachedView()) {
            return response()->make($cachedView, 200, ['Content-type' => 'text/xml']);
        }

        $sitemapIndex = response()->view('sitemap::sitemaps', ['__sitemaps' => $this->getSitemaps()], 200, ['Content-type' => 'text/xml']);

        $this->saveCachedView($sitemapIndex);

        return $sitemapIndex;
    }

    /**
     * Render an index of sitemaps.
     *
     * @return \Illuminate\Http\Response
     */
    public function renderSitemapIndex()
    {
        return $this->index();
    }

    /**
     * Add a new sitemap tag to the sitemap.
     *
     * @param  \Watson\Sitemap\Tags\Tag|string  $location
     * @param  \DateTime|string  $lastModified
     * @param  string  $changeFrequency
     * @param  string  $priority
     * @return \Watson\Sitemap\Tags\Tag
     */
    public function addTag($location, $lastModified = null, $changeFrequency = null, $priority = null)
    {
        $tag = $location instanceof Tag ? $location : new Tag($location, $lastModified, $changeFrequency, $priority);

        $this->tags[] = $tag;

        return $tag;
    }

    /**
     * Add a new expired tag to the sitemap.
     *
     * @param  string  $location
     * @param  \DateTime|string  $expired
     * @return void
     */
    public function addExpiredTag($location, $expired = null)
    {
        $tag = $location instanceof ExpiredTag ? $location : new ExpiredTag($location, $expired);

        $this->tags[] = $tag;
    }

    /**
     * Retrieve the array of tags.
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Get the formatted sitemap.
     *
     * @return string
     */
    public function xml()
    {
        return $this->render()->getOriginalContent();
    }

    /**
     * Get the formatted sitemap index.
     *
     * @return string
     */
    public function xmlIndex()
    {
        return $this->index()->getOriginalContent();
    }

    /**
     * Render a sitemap.
     *
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        if ($cachedView = $this->getCachedView()) {
            return response()->make($cachedView, 200, ['Content-type' => 'text/xml']);
        }

        $sitemap = response()->view('sitemap::sitemap', [
            '__tags' => $this->getTags(),
            '__hasImages' => $this->imagesPresent(),
            '__isMultilingual' => $this->multilingualTagsPresent()
        ], 200, ['Content-type' => 'text/xml']);

        $this->saveCachedView($sitemap);

        return $sitemap;
    }

    /**
     * Render a sitemap.
     *
     * @return \Illuminate\Http\Response
     */
    public function renderSitemap()
    {
        return $this->render();
    }

    /**
     * Clear all the existing sitemaps and tags.
     *
     * @return void
     */
    public function clear()
    {
        $this->sitemaps = $this->tags = [];
    }

    /**
     * Remove all the existing sitemaps.
     *
     * @return void
     */
    public function clearSitemaps()
    {
        $this->sitemaps = [];
    }

    /**
     * Remove all the existing tags.
     *
     * @return void
     */
    public function clearTags()
    {
        $this->tags = [];
    }

    /**
     * Check whether the sitemap has a cached view or not.
     *
     * @return bool
     */
    public function hasCachedView()
    {
        if (config('sitemap.cache_enabled')) {
            $key = $this->getCacheKey();

            return $this->cache->has($key);
        }

        return false;
    }

    /**
     * Return whether there are any images present in the sitemap.
     *
     * @return bool
     */
    protected function imagesPresent()
    {
        foreach ($this->tags as $tag) {
            if ($tag->hasImages()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Return whether there are any multilingual tags present in the sitemap.
     *
     * @return bool
     */
    protected function multilingualTagsPresent()
    {
        foreach ($this->tags as $tag) {
            if ($tag instanceof MultilingualTag) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check to see whether a view has already been cached for the current
     * route and if so, return it.
     *
     * @return mixed
     */
    protected function getCachedView()
    {
        if ($this->hasCachedView()) {
            $key = $this->getCacheKey();

            return $this->cache->get($key);
        }

        return false;
    }

    /**
     * Save a cached view if caching is enabled.
     *
     * @param  \Illuminate\Http\Response  $response
     * @return void
     */
    protected function saveCachedView(Response $response)
    {
        if (config('sitemap.cache_enabled')) {
            $key = $this->getCacheKey();

            $content = $response->getOriginalContent()->render();

            if (!$this->cache->get($key)) {
                $this->cache->put($key, $content, config('sitemap.cache_length'));
            }
        }
    }

    /**
     * Get the cache key that will be used for saving cached sitemaps
     * to storage.
     *
     * @return string
     */
    protected function getCacheKey()
    {
        return 'sitemap_' . str_slug($this->request->url());
    }
}
