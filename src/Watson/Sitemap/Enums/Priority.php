<?php

namespace Watson\Sitemap\Enums;

class Priority
{
    /**
     * The highest possible priority.
     *
     * @var int
     */
    const HIGHEST = 1;

    /**
     * A high priority.
     *
     * @var float
     */
    const HIGH = 0.8;

    /**
     * A medium priority.
     *
     * @var float
     */
    const MEDIUM = 0.5;

    /**
     * A low priority.
     *
     * @var float
     */
    const LOW = 0.2;

    /**
    * The lowest possible priority.
    *
    * @var int
    */
    const LOWEST = 0;
}
