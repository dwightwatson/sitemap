<?php namespace Watson\Sitemap;

use Carbon\Carbon;
use Illuminate\Config\Repository as Config;
use Illuminate\Cache\CacheManager as Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class Sitemap
{
	/**
	 * Collection of sitemaps being used.
	 *
	 * @var array
	 */
	protected $sitemaps = array();

	/**
	 * Collection of tags being used in a sitemap.
	 *
	 * @var array
	 */
	protected $tags = array();

	/**
	 * Laravel config repository.
	 *
	 * @var \Illuminate\Config\Repository
	 */
	protected $config;

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

	public function __construct(Config $config, Cache $cache, Request $request)
	{
		$this->config = $config;
		$this->cache = $cache;
		$this->request = $request;
	}

	/**
	 * Add new sitemap to the sitemaps index.
	 *
	 * @param  string  $loc
	 * @param  string  $lastmod
	 * @return void
	 */
	public function addSitemap($loc, $lastmod = null)
	{
		if ($lastmod)
		{
			$lastmod = Carbon::parse($lastmod)->toDateTimeString();
		}

		$this->sitemaps[] = compact('loc', 'lastmod');
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
	 * Render an index of of sitemaps.
	 *
	 * @return Illuminate\Support\Facades\Response;
	 */
	public function renderSitemapIndex()
	{
		if ($cachedView = $this->getCachedView()) return Response::make($cachedView, 200, array('Content-type' => 'text/xml'));

		$sitemapIndex = Response::view('sitemap::sitemaps', array('sitemaps' => $this->sitemaps), 200, array('Content-type' => 'text/xml'));

		$this->saveCachedView($sitemapIndex);

		return $sitemapIndex;
	}

	/**
	 * Add a new sitemap tag to the sitemap.
	 *
	 * @param  string  $loc
	 * @param  string  $lastmod
	 * @param  string  $changefreq
	 * @param  string  $priority
	 * @return void
	 */
	public function addTag($loc, $lastmod = null, $changefreq = null, $priority = null)
	{
		if ($lastmod)
		{
			$lastmod = Carbon::parse($lastmod)->toDateTimeString();
		}

		$this->tags[] = compact('loc', 'lastmod', 'changefreq', 'priority');
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
		return $this->renderSitemap()->getOriginalContent();
	}

	/**
	 * Render a sitemap.
	 *
	 * @return Illuminate\Support\Facades\Response;
	 */
	public function renderSitemap()
	{
		if ($cachedView = $this->getCachedView()) return Response::make($cachedView, 200, array('Content-type' => 'text/xml'));

		$sitemap = Response::view('sitemap::sitemap', array('tags' => $this->tags), 200, array('Content-type' => 'text/xml'));

		$this->saveCachedView($sitemap);

		return $sitemap;
	}

	/**
	 * Check to see whether a view has already been cached for the current
	 * route and if so, return it.
	 *
	 * @return mixed
	 */
	protected function getCachedView()
	{
		if ($this->config->get('sitemap::cache_enabled'))
		{
			$key = $this->getCacheKey();

			if ($this->cache->has($key)) return $this->cache->get($key);
		}

		return false;
	}

	/**
	 * Save a cached view if caching is enabled.
	 *
	 * @param  Response  $view
	 * @return void
	 */
	protected function saveCachedView($response)
	{
		if ($this->config->get('sitemap::cache_enabled'))
		{
			$key = $this->getCacheKey();

			$content = $response->getOriginalContent()->render();

			if ( ! $this->cache->get($key)) $this->cache->put($key, $content, $this->config->get('sitemap::cache_length'));
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
		return 'sitemap_' . Str::slug($this->request->url());
	}

	/**
	 * Clear all the existing sitemaps and tags.
	 *
	 * @return void
	 */
	public function clear()
	{
		$this->sitemaps = $this->tags = array();
	}
}
