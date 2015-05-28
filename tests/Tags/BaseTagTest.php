<?php

use Watson\Sitemap\Tags\BaseTag;

class BaseTagTest extends PHPUnit_Framework_TestCase
{
    protected $sitemap;

    public function setUp()
    {
        parent::setUp();

        date_default_timezone_set('UTC');

        $this->sitemap = new BaseTagStub('foo', '2014-01-01 00:00:00');
    }

    public function test_last_modified_defaults_to_null()
    {
        $sitemap = new BaseTagStub('foo');

        $this->assertNull($sitemap->getLastModified());
    }

    public function test_get_location()
    {
        $this->assertEquals('foo', $this->sitemap->getLocation());
    }

    public function test_set_location()
    {
        $this->sitemap->setLocation('bar');

        $this->assertEquals('bar', $this->sitemap->getLocation());
    }

    public function test_get_last_modified()
    {
        $dateTime = new DateTime('2014-01-01 00:00:00');

        $this->assertEquals($dateTime, $this->sitemap->getLastModified());
    }

    public function test_set_last_modified()
    {
        $this->sitemap->setLastModified('2013-01-01 00:00:00');

        $dateTime = new DateTime('2013-01-01 00:00:00');

        $this->assertEquals($dateTime, $this->sitemap->getLastModified());
    }

    public function test_set_last_modified_with_string()
    {
        $this->sitemap->setLastModified('1st January 2013');

        $dateTime = new DateTime('2013-01-01 00:00:00');

        $this->assertEquals($dateTime, $this->sitemap->getLastModified());
    }

    public function test_set_last_modified_with_datetime()
    {
        $dateTime = new DateTime('2013-01-01 00:00:00');

        $this->sitemap->setLastModified($dateTime);

        $this->assertEquals($dateTime, $this->sitemap->getLastModified());
    }

    public function test_set_last_modified_with_eloquent_model()
    {
        $dateTime = new DateTime('2013-01-01 00:00:00');

        $model = Mockery::mock('Illuminate\Database\Eloquent\Model');
        $model->updated_at = $dateTime;

        $this->sitemap->setLastModified($model);

        $this->assertEquals($dateTime, $this->sitemap->getLastModified());
    }

    public function test_can_use_as_array()
    {
        $this->assertEquals('foo', $this->sitemap['loc']);

        $this->sitemap['loc'] = 'bar';

        $this->assertEquals('bar', $this->sitemap['loc']);
    }
}

class BaseTagStub extends BaseTag {}