<?php

use Watson\Sitemap\ChangeFrequency;

class ChangeFrequencyTest extends PHPUnit_Framework_TestCase
{
    /** @test */
    function always_set_correctly()
    {
        $this->assertEquals('always', ChangeFrequency::ALWAYS);
    }

    /** @test */
    function hourly_set_correctly()
    {
        $this->assertEquals('hourly', ChangeFrequency::HOURLY);
    }

    /** @test */
    function daily_set_correctly()
    {
        $this->assertEquals('daily', ChangeFrequency::DAILY);
    }

    /** @test */
    function weekly_set_correctly()
    {
        $this->assertEquals('weekly', ChangeFrequency::WEEKLY);
    }

    /** @test */
    function monthly_set_correctly()
    {
        $this->assertEquals('monthly', ChangeFrequency::MONTHLY);
    }

    /** @test */
    function yearly_set_correctly()
    {
        $this->assertEquals('yearly', ChangeFrequency::YEARLY);
    }

    /** @test */
    function never_set_correctly()
    {
        $this->assertEquals('never', ChangeFrequency::NEVER);
    }
}
