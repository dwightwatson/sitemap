<?php

namespace Watson\Tests\Definitions;

use PHPUnit\Framework\TestCase;
use Watson\Sitemap\Definitions\Definition;

class DefinitionTest extends TestCase
{
    use Concerns\LocatableAndModifiableTest;

    public $definition;

    function setUp()
    {
        $this->definition = new DefinitionStub;
    }

    /** @test */
    function it_gets_and_sets_change_frequency()
    {
        $this->definition->setChangeFrequency('daily');

        $this->assertEquals('daily', $this->definition->getChangeFrequency());
    }

    /** @test */
    function it_sets_frequency_from_changes()
    {
        $this->definition->changes('daily');

        $this->assertEquals('daily', $this->definition->getChangeFrequency());
    }


    /** @test */
    function it_gets_and_sets_priority()
    {
        $this->definition->setPriority(1);

        $this->assertEquals(1, $this->definition->getPriority());
    }

    /** @test */
    function it_sets_priority_from_priority()
    {
        $this->definition->priority(1);

        $this->assertEquals(1, $this->definition->getPriority());
    }
}

class DefinitionStub extends Definition
{
    //
}
