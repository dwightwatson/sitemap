<?php 

namespace Watson\Sitemap\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static addSitemap($location, $lastModified = null)
 * @method static getSitemaps()
 * @method static index()
 * @method static renderSitemapIndex()
 * @method static addTag($location, $lastModified = null, $changeFrequency = null, $priority = null)
 * @method static addExpiredTag($location, $expired = null)
 * @method static getTags()
 * @method static xml()
 * @method static xmlIndex()
 * @method static render()
 * @method static renderSitemap()
 * @method static clear()
 * @method static clearSitemaps()
 * @method static clearTags()
 * @method static hasCachedView()
 */
class Sitemap extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'sitemap';
    }
}
