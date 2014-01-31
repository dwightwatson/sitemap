<?php

class SitemapTest extends PHPUnit_Framework_TestCase 
{
    protected $sitemap;

    public function setUp()
    {
        parent::setUp();

        $this->sitemap = new Studious\Sitemap\Sitemap;
    }

	public function testSitemapIsAdded()
    {
        $this->assertCount(0, $this->sitemap->getSitemaps());

        $this->sitemap->addSitemap('foo', '2014-01-01 00:00:00');

        $this->assertEquals([
            [
                'loc'     => 'foo',
                'lastmod' => '2014-01-01 00:00:00'
            ]
        ], $this->sitemap->getSitemaps());
    }

    public function testSitemapIsAddedWithoutLastMod()
    {
        $this->assertCount(0, $this->sitemap->getSitemaps());

        $this->sitemap->addSitemap('foo');

        $this->assertEquals([
            [
                'loc'     => 'foo',
                'lastmod' => null
            ]
        ], $this->sitemap->getSitemaps());
    }

    public function testSitemapIsAddedWithFormattedTimestamp()
    {
        $this->sitemap->addSitemap('foo', '1st January 2014');

        $this->assertEquals([
            [
                'loc'     => 'foo', 
                'lastmod' => '2014-01-01 00:00:00'
            ]
        ], $this->sitemap->getSitemaps());
    }

    public function testGetSitemapsWorks()
    {
        $this->assertEquals($this->sitemap->getSitemaps(), []);

        $this->sitemap->addSitemap('foo');

        $this->assertEquals($this->sitemap->getSitemaps(), [
            [
                'loc'     => 'foo',
                'lastmod' => null
            ]
        ]);
    }

    public function testRenderSiteMapIndexWorks()
    {
        //
    }

    public function testTagIsAdded()
    {
        $this->assertCount(0, $this->sitemap->getTags());

        $this->sitemap->addTag('foo', '2014-01-01 00:00:00', 'daily', '0.9');

        $this->assertEquals([
            [
                'loc'        => 'foo',
                'lastmod'    => '2014-01-01 00:00:00',
                'changefreq' => 'daily',
                'priority'   => '0.9'
            ]
        ], $this->sitemap->getTags());
    }

    public function testTagIsAddedWithOnlyLoc()
    {
        $this->assertCount(0, $this->sitemap->getTags());

        $this->sitemap->addTag('foo');

        $this->assertEquals([
            [
                'loc'        => 'foo',
                'lastmod'    => null,
                'changefreq' => null,
                'priority'   => null
            ]
        ], $this->sitemap->getTags());
    }

    public function testTagIsAddedWithFormattedTimestamp()
    {
        $this->sitemap->addTag('foo', '1st January 2014');

        $this->assertEquals([
            [
                'loc'        => 'foo', 
                'lastmod'    => '2014-01-01 00:00:00',
                'changefreq' => null,
                'priority'   => null
            ]
        ], $this->sitemap->getTags());
    }

    public function testGetTagsWorks()
    {
        $this->assertEquals($this->sitemap->getTags(), []);

        $this->sitemap->addTag('foo');

        $this->assertEquals([
            [
                'loc'        => 'foo',
                'lastmod'    => null,
                'changefreq' => null,
                'priority'   => null
            ]
        ], $this->sitemap->getTags());
    }

    public function testRenderSitemapWorks()
    {
        //
    }
}