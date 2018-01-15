<?php

use Watson\Sitemap\Tags\MultilingualTag;

class MultilingualTagTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->tag = new MultilingualTag('foo', '2014-01-01 00:00:00', 'bar', 'bat', ['en' => 'http://foo.com']);
    }

    public function test_get_multilingual()
    {
        $this->assertEquals(['en' => 'http://foo.com'], $this->tag->getMultilingual());
    }

    public function test_set_multilingual()
    {
        $this->tag->setMultilingual(['foo' => 'bar']);

        $this->assertEquals(['foo' => 'bar'], $this->tag->getMultilingual());
    }
}