<?php

namespace Watson\Tests\Definitions;

use PHPUnit\Framework\TestCase;
use Watson\Sitemap\Definitions\SitemapDefinition;

class SitemapDefinitionTest extends TestCase
{
    use Concerns\LocatableAndModifiableTest;

    public $definition;

    function setUp()
    {
        $this->definition = new SitemapDefinition;
    }
}
