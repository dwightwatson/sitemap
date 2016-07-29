<?php

namespace Watson\Sitemap\Definitions;

class TagDefinition extends Definition
{
    /**
     * Instantiate a new tag definition.
     *
     * @param  string  $location
     * @return void
     */
    public function __construct(string $location)
    {
        $this->setLocation($location);
    }
}
