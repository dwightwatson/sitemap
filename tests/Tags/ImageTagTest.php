<?php

use Watson\Sitemap\Tags\Tag;
use Watson\Sitemap\Tags\ImageTag;

class ImageTagTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();

        date_default_timezone_set('UTC');

        $this->tag = new ImageTag('foo', 'bar', 'baz', 'bat', 'foobar');
    }

    public function test_get_caption()
    {
        $this->assertEquals('bar', $this->tag->getCaption());
    }

    public function test_set_caption()
    {
        $this->tag->setCaption('baz');

        $this->assertEquals('baz', $this->tag->getCaption());
    }

    public function test_get_geo_locaion()
    {
        $this->assertEquals('baz', $this->tag->getGeoLocation());
    }

    public function test_set_geo_locaion()
    {
        $this->tag->setGeoLocation('foobaz');

        $this->assertEquals('foobaz', $this->tag->getGeoLocation());
    }

    public function test_get_title()
    {
        $this->assertEquals('bat', $this->tag->getTitle());
    }

    public function test_set_title()
    {
        $this->tag->setTitle('baz');

        $this->assertEquals('baz', $this->tag->getTitle());
    }

    public function test_get_license()
    {
        $this->assertEquals('foobar', $this->tag->getLicense());
    }

    public function test_set_license()
    {
        $this->tag->setLicense('baz');

        $this->assertEquals('baz', $this->tag->getLicense());
    }
}
