<?php

use Watson\Sitemap\Tags\Tag;
use Watson\Sitemap\Tags\ImageTag;
use Watson\Sitemap\Tags\Sitemap;

class SitemapTest extends PHPUnit_Framework_TestCase
{
    protected $sitemap;

    public function setUp()
    {
        parent::setUp();

        $this->cache = Mockery::mock('Illuminate\Contracts\Cache\Repository');
        $this->request = Mockery::mock('Illuminate\Http\Request');

        $this->sitemap = new Watson\Sitemap\Sitemap(
            $this->cache,
            $this->request
        );

        date_default_timezone_set('UTC');
    }

    public function test_sitemap_is_created()
    {
        $this->sitemap->addSitemap('foo', '2014-01-01 00:00:00');

        $this->assertEquals([new Sitemap('foo', '2014-01-01 00:00:00')], $this->sitemap->getSitemaps());
    }

    public function test_sitemap_is_added()
    {
        $sitemap = new Sitemap('foo', '2014-01-01 00:00:00');

        $this->sitemap->addSitemap($sitemap);

        $this->assertEquals([$sitemap], $this->sitemap->getSitemaps());
    }

    public function test_renders_sitemaps()
    {
        //
    }

    public function test_tag_is_created()
    {
        $this->sitemap->addTag('foo', '2014-01-01 00:00:00', 'daily', '0.9');

        $this->assertEquals([new Tag('foo', '2014-01-01 00:00:00', 'daily', '0.9')], $this->sitemap->getTags());
    }

    public function test_tag_is_added()
    {
        $tag = new Tag('foo');

        $this->sitemap->addTag($tag);

        $this->assertEquals([$tag], $this->sitemap->getTags());
    }

    public function test_render_sitemap()
    {
        //
    }

    public function test_add_image_tag()
    {
        $tag = new Tag('foo');

        $image = new ImageTag('foo', 'bar');
        $tag->addImage($image);

        $this->assertEquals([$image], $tag->getImages());
    }

    public function test_add_full_image_tag()
    {
        $tag = new Tag('bar');

        $image = new ImageTag('foo', 'bar', 'baz', 'bat', 'foobar');
        $tag->addImage($image);

        $this->assertEquals([$image], $tag->getImages());
    }
}
