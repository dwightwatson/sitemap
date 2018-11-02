<?php

namespace Watson\Tests\Definitions;

use Mockery;
use DateTime;
use PHPUnit\Framework\TestCase;
use Watson\Sitemap\Definitions\Definition;

class DefinitionTest extends TestCase
{
    public $definition;

    function setUp()
    {
        $this->definition = new DefinitionStub('/foo');
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
}

class DefinitionStub extends Definition
{
    //
}
