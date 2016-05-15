<?php

class SitemapTest extends PHPUnit_Framework_TestCase 
{
    protected $sitemap;

    public function setUp()
    {
        parent::setUp();

        $this->config = Mockery::mock('Illuminate\Config\Repository');
        $this->cache = Mockery::mock('Illuminate\Cache\CacheManager');
        $this->request = Mockery::mock('Illuminate\Http\Request');

        $this->sitemap = new Watson\Sitemap\Sitemap(
            $this->config,
            $this->cache,
            $this->request
        );
    }

	public function testSitemapIsAdded()
    {
        $this->assertCount(0, $this->sitemap->getSitemaps());

        $this->sitemap->addSitemap('foo', '2014-01-01 00:00:00');

        $this->assertEquals(array(
            array(
                'loc'     => 'foo',
                'lastmod' => '2014-01-01 00:00:00'
            )
        ), $this->sitemap->getSitemaps());
    }

    public function testSitemapIsAddedWithoutLastMod()
    {
        $this->assertCount(0, $this->sitemap->getSitemaps());

        $this->sitemap->addSitemap('foo');

        $this->assertEquals(array(
            array(
                'loc'     => 'foo',
                'lastmod' => null
            )
        ), $this->sitemap->getSitemaps());
    }

    public function testSitemapIsAddedWithFormattedTimestamp()
    {
        $this->sitemap->addSitemap('foo', '1st January 2014');

        $this->assertEquals(array(
            array(
                'loc'     => 'foo', 
                'lastmod' => '2014-01-01 00:00:00'
            )
        ), $this->sitemap->getSitemaps());
    }

    public function testGetSitemapsWorks()
    {
        $this->assertEquals($this->sitemap->getSitemaps(), array());

        $this->sitemap->addSitemap('foo');

        $this->assertEquals($this->sitemap->getSitemaps(), array(
            array(
                'loc'     => 'foo',
                'lastmod' => null
            )
        ));
    }

    public function testRenderSiteMapIndexWorks()
    {
        //
    }

    public function testTagIsAdded()
    {
        $this->assertCount(0, $this->sitemap->getTags());

        $this->sitemap->addTag('foo', '2014-01-01 00:00:00', 'daily', '0.9');

        $this->assertEquals(array(
            array(
                'loc'        => 'foo',
                'lastmod'    => '2014-01-01 00:00:00',
                'changefreq' => 'daily',
                'priority'   => '0.9'
            )
        ), $this->sitemap->getTags());
    }

    public function testTagIsAddedWithOnlyLoc()
    {
        $this->assertCount(0, $this->sitemap->getTags());

        $this->sitemap->addTag('foo');

        $this->assertEquals(array(
            array(
                'loc'        => 'foo',
                'lastmod'    => null,
                'changefreq' => null,
                'priority'   => null
            )
        ), $this->sitemap->getTags());
    }

    public function testTagIsAddedWithFormattedTimestamp()
    {
        $this->sitemap->addTag('foo', '1st January 2014');

        $this->assertEquals(array(
            array(
                'loc'        => 'foo', 
                'lastmod'    => '2014-01-01 00:00:00',
                'changefreq' => null,
                'priority'   => null
            )
        ), $this->sitemap->getTags());
    }

    public function testGetTagsWorks()
    {
        $this->assertEquals($this->sitemap->getTags(), array());

        $this->sitemap->addTag('foo');

        $this->assertEquals(array(
            array(
                'loc'        => 'foo',
                'lastmod'    => null,
                'changefreq' => null,
                'priority'   => null
            )
        ), $this->sitemap->getTags());
    }

    public function testRenderSitemapWorks()
    {
        //
    }
    
    public function testClearEmptiesSitemapAndTags() 
    {
        $this->sitemap->addSitemap('foo', '2014-01-01 00:00:00');
        $this->sitemap->addTag('foo', '2014-01-01 00:00:00', 'daily', '0.9');
        
        $this->sitemap->clear();
        
        $this->assertEmpty($this->sitemap->getSitemaps());
        $this->assertEmpty($this->sitemap->getTags());
    }
}