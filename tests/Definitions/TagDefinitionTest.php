<?php

use Watson\Sitemap\Definitions\TagDefinition;

class TagDefinitionTest extends PHPUnit_Framework_TestCase
{
    public $tagDefinition;

    function setUp()
    {
        $this->tagDefinition = new TagDefinition('/foo');
    }

    /** @test */
    function it_gets_location()
    {
        $this->assertEquals('/foo', $this->tagDefinition->getLocation());
    }
}
