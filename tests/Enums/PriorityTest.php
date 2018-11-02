<?php

namespace Watson\Tests\Enums;

use PHPUnit\Framework\TestCase;
use Watson\Sitemap\Enums\Priority;

class PriorityTest extends TestCase
{
    /** @test */
    function highest_set_correctly()
    {
        $this->assertEquals(1, Priority::HIGHEST);
    }

    /** @test */
    function higher_set_correctly()
    {
        $this->assertEquals(0.85, Priority::HIGHER);
    }

    /** @test */
    function high_set_correctly()
    {
        $this->assertEquals(0.7, Priority::HIGH);
    }

    /** @test */
    function medium_set_correctly()
    {
        $this->assertEquals(0.5, Priority::MEDIUM);
    }

    /** @test */
    function low_set_correctly()
    {
        $this->assertEquals(0.3, Priority::LOW);
    }

    /** @test */
    function lower_set_correctly()
    {
        $this->assertEquals(0.15, Priority::LOWER);
    }

    /** @test */
    function lowest_set_correctly()
    {
        $this->assertEquals(0, Priority::LOWEST);
    }
}
