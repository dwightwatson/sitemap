<?php

use PHPUnit\Framework\TestCase;
use Watson\Sitemap\Definitions\Definition;

class DefinitionTest extends TestCase
{
    public $definition;

    function setUp(): void
    {
        $this->definition = new DefinitionStub;
    }

    /** @test */
    function it_gets_and_sets_location()
    {
        $this->definition->setLocation('/faq');

        $this->assertEquals('/faq', $this->definition->getLocation());
    }


    /** @test */
    function it_gets_and_sets_last_modified_timestamp()
    {
        $this->definition->setLastModified($mock = Mockery::mock(DateTime::class));

        $this->assertEquals($mock, $this->definition->getLastModified());
    }

    /** @test */
    function it_sets_last_modified_timestamp_from_a_string()
    {
        $this->definition->setLastModified('2000-01-01 00:00:00');

        $this->assertEquals(
            '2000-01-01 00:00:00',
            $this->definition->getLastModified()->format('Y-m-d H:i:s')
        );
    }

    /** @test */
    function it_sets_the_last_modified_timestamp_from_modified()
    {
        $this->definition->modified($mock = Mockery::mock(DateTime::class));

        $this->assertEquals($mock, $this->definition->getLastModified());
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
