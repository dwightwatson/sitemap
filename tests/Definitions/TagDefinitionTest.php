<?php

namespace Watson\Tests\Definitions;

use Mockery;
use DateTime;
use PHPUnit\Framework\TestCase;
use Watson\Sitemap\Definitions\TagDefinition;

class TagDefinitionTest extends TestCase
{
    public $definition;

    function setUp(): void
    {
        $this->definition = new TagDefinition('/foo');
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

    /** @test */
    function it_gets_and_sets_expired_timestamp()
    {
        $this->definition->setExpired($mock = Mockery::mock(DateTime::class));

        $this->assertEquals($mock, $this->definition->getExpired());
    }

    /** @test */
    function it_sets_expired_timestamp_from_a_string()
    {
        $this->definition->setExpired('2000-01-01 00:00:00');

        $this->assertEquals(
            '2000-01-01 00:00:00',
            $this->definition->getExpired()->format('Y-m-d H:i:s')
        );
    }

    /** @test */
    function it_sets_the_expired_timestamp_from_expired()
    {
        $this->definition->expired($mock = Mockery::mock(DateTime::class));

        $this->assertEquals($mock, $this->definition->getExpired());
    }
}
