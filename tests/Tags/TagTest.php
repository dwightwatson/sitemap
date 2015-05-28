<?php

use Watson\Sitemap\Tags\Tag;
use Watson\Sitemap\Tags\ChangeFrequency;

class TagTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();

        date_default_timezone_set('UTC');

        $this->tag = new Tag('foo', '2014-01-01 00:00:00', 'bar', 'bat');
    }

    public function test_get_change_frequency()
    {
        $this->assertEquals('bar', $this->tag->getChangeFrequency());
    }

    public function test_set_change_frequency()
    {
        $this->tag->setChangeFrequency('baz');

        $this->assertEquals('baz', $this->tag->getChangeFrequency());
    }

    public function test_set_change_frequency_with_changefrequency()
    {
        $this->tag->setChangeFrequency(ChangeFrequency::NEVER);

        $this->assertEquals('never', $this->tag->getChangeFrequency());
    }

    public function test_get_priority()
    {
        $this->assertEquals('bat', $this->tag->getPriority());
    }

    public function test_set_priority()
    {
        $this->tag->setPriority('bar');

        $this->assertEquals('bar', $this->tag->getPriority());
    }
}