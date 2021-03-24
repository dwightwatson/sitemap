<?php

namespace Watson\Tests;

use Watson\Sitemap\Registrar;
use PHPUnit\Framework\TestCase;
use Watson\Sitemap\Definitions\TagDefinition;
use Watson\Sitemap\Definitions\ModelDefinition;

class RegisterTest extends TestCase
{
    public $registrar;

    function setUp(): void
    {
        $this->registrar = new Registrar;
    }

    /** @test */
    function it_adds_a_tag_definition()
    {
        $definition = $this->registrar->add('/faq');

        $this->assertInstanceOf(TagDefinition::class, $definition);
        $this->assertCount(1, $this->registrar->getTagDefinitions());
    }

    /** @test */
    function it_adds_a_model_definition()
    {
        $definition = $this->registrar->model('User');

        $this->assertInstanceOf(ModelDefinition::class, $definition);
        $this->assertCount(1, $this->registrar->getModelDefinitions());
    }

    /** @test */
    function it_gets_definitions()
    {
        $this->assertEquals([], $this->registrar->getTagDefinitions()->toArray());

        $definition = $this->registrar->add('/faq');

        $this->assertEquals(
            [$definition],
            $this->registrar->getTagDefinitions()->toArray()
        );
    }

    /** @test */
    function it_gets_model_definitions()
    {
        $this->assertEmpty($this->registrar->getModelDefinitions());

        $this->registrar->add('/faq');
        $this->registrar->model('User');

        $this->assertCount(1, $this->registrar->getModelDefinitions());
    }
}
