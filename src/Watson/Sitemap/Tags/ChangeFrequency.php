<?php namespace Watson\Sitemap\Tags;

class ChangeFrequency
{
    /**
     * Changes every time it is accessed.
     *
     * @var string
     */
    const ALWAYS = 'always';

    /**
     * Changes hourly.
     *
     * @var string
     */
    const HOURLY = 'hourly';

    /**
     * Changes daily.
     *
     * @var string
     */
    const DAILY = 'daily';

    /**
     * Changes weekly.
     *
     * @var string
     */
    const WEEKLY = 'weekly';

    /**
     * Changes monthly.
     *
     * @var string
     */
    const MONTHLY = 'monthly';

    /**
     * Changes yearly.
     *
     * @var string
     */
    const YEARLY = 'yearly';

    /**
     * Never changes, archived content.
     *
     * @var string
     */
    const NEVER = 'never';
}
