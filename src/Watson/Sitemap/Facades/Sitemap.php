<?php

namespace Watson\Sitemap\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void addSitemap(\Watson\Sitemap\Tags\Sitemap|string $location, \DateTimeInterface|string|null $lastModified = null)
 * @method static \Watson\Sitemap\Tags\Sitemap[] getSitemaps()
 * @method static \Illuminate\Http\Response index()
 * @method static \Illuminate\Http\Response renderSitemapIndex()
 * @method static \Watson\Sitemap\Tags\Tag addTag(\Watson\Sitemap\Tags\Tag|string $location, \DateTimeInterface|string|null $lastModified = null, string|null $changeFrequency = null, string|null $priority = null)
 * @method static void addExpiredTag(\Watson\Sitemap\Tags\ExpiredTag|string $location, \DateTimeInterface|string|null $expired = null)
 * @method static \Watson\Sitemap\Tags\BaseTag[] getTags()
 * @method static string xml()
 * @method static string xmlIndex()
 * @method static \Illuminate\Http\Response render()
 * @method static \Illuminate\Http\Response renderSitemap()
 * @method static void clear()
 * @method static void clearSitemaps()
 * @method static void clearTags()
 * @method static bool hasCachedView()
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
