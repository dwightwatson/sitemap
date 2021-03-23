<?php

use PHPUnit\Framework\TestCase;
use Watson\Sitemap\Definitions\TagDefinition;

class TagDefinitionTest extends TestCase
{
    public $tagDefinition;

    function setUp(): void
    {
        $this->tagDefinition = new TagDefinition('/foo');
    }

    /** @test */
    function it_gets_location()
    {
        $this->assertEquals('/foo', $this->tagDefinition->getLocation());
    }
}
