<?php

namespace Watson\Tests\Definitions;

use PHPUnit\Framework\TestCase;
use Watson\Sitemap\Definitions\TagDefinition;

class TagDefinitionTest extends TestCase
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
