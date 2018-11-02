<?php

namespace Watson\Tests\Definitions;

use PHPUnit\Framework\TestCase;
use Watson\Sitemap\Definitions\SitemapDefinition;

class SitemapDefinitionTest extends TestCase
{
    public $definition;

    function setUp()
    {
        $this->definition = new SitemapDefinition('/foo');
    }

    /** @test */
    function it_can_be_instantiated()
    {
        $this->assertInstanceOf(SitemapDefinition::class, $this->definition);
    }
}
