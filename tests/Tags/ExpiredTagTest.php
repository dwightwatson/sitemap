<?php

use Watson\Sitemap\Tags\ExpiredTag;
use Watson\Sitemap\Tags\ChangeFrequency;

class ExpiredTagTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();

        date_default_timezone_set('UTC');

        $this->tag = new ExpiredTag('foo', '2014-01-01 00:00:00');
    }

    public function test_get_expired()
    {
        $dateTime = new DateTime('2014-01-01 00:00:00');

        $this->assertEquals($dateTime, $this->tag->getExpired());
    }

    public function test_set_expired()
    {
        $this->tag->setExpired('2013-01-01 00:00:00');

        $dateTime = new DateTime('2013-01-01 00:00:00');

        $this->assertEquals($dateTime, $this->tag->getExpired());
    }

    public function test_set_last_modified_with_string()
    {
        $this->tag->setExpired('1st January 2013');

        $dateTime = new DateTime('2013-01-01 00:00:00');

        $this->assertEquals($dateTime, $this->tag->getExpired());
    }

    public function test_set_last_modified_with_datetime()
    {
        $dateTime = new DateTime('2013-01-01 00:00:00');

        $this->tag->setExpired($dateTime);

        $this->assertEquals($dateTime, $this->tag->getExpired());
    }

    public function test_set_last_modified_with_deleted_eloquent_model()
    {
        $dateTime = new DateTime('2013-01-01 00:00:00');

        $model = Mockery::mock('Illuminate\Database\Eloquent\Model');
        $model->deleted_at = $dateTime;

        $this->tag->setExpired($model);

        $this->assertEquals($dateTime, $this->tag->getExpired());
    }

    public function test_set_last_modified_with_eloquent_model()
    {
        $dateTime = new DateTime('2013-01-01 00:00:00');

        $model = Mockery::mock('Illuminate\Database\Eloquent\Model');
        $model->deleted_at = null;
        $model->updated_at = $dateTime;

        $this->tag->setExpired($model);

        $this->assertEquals($dateTime, $this->tag->getExpired());
    }
}