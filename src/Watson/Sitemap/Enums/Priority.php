<?php

namespace Watson\Sitemap\Enums;

class Priority
{
    /**
     * The highest priority.
     *
     * @var int
     */
    const HIGHEST = 1;

    /**
     * The higher priority.
     *
     * @var float
     */
    const HIGHER = 0.85;

    /**
     * The high priority.
     *
     * @var float
     */
    const HIGH = 0.7;

    /**
     * The medium priority.
     *
     * @var float
     */
    const MEDIUM = 0.5;

    /**
     * The low priority.
     *
     * @var float
     */
    const LOW = 0.3;

    /**
     * The lower priority.
     *
     * @var float
     */
    const LOWER = 0.15;

    /**
    * The lowest priority.
    *
    * @var int
    */
    const LOWEST = 0;
}
