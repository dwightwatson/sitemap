<?php

use Watson\Sitemap\Builder;
use Watson\Sitemap\Definitions\TagDefinition;
use Watson\Sitemap\Definitions\ModelDefinition;

class BuilderTest extends PHPUnit_Framework_TestCase
{
    public $builder;

    function setUp()
    {
        $this->builder = new Builder;
    }

    /** @test */
    function it_adds_a_tag_definition()
    {
        $definition = $this->builder->add('/faq');

        $this->assertInstanceOf(TagDefinition::class, $definition);
        $this->assertCount(1, $this->builder->getDefinitions());
    }

    /** @test */
    function it_adds_a_model_definition()
    {
        $definition = $this->builder->model('User');

        $this->assertInstanceOf(ModelDefinition::class, $definition);
        $this->assertCount(1, $this->builder->getDefinitions());
    }

    /** @test */
    function it_gets_definitions()
    {
        $this->assertEquals([], $this->builder->getDefinitions()->toArray());

        $definition = $this->builder->add('/faq');

        $this->assertEquals(
            [$definition],
            $this->builder->getDefinitions()->toArray()
        );
    }

    /** @test */
    function it_gets_model_definitions()
    {
        $this->assertEmpty($this->builder->getModelDefinitions());

        $this->builder->add('/faq');
        $this->builder->model('User');

        $this->assertCount(1, $this->builder->getModelDefinitions());
    }
}
