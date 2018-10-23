<?php

namespace Watson\Sitemap\Definitions\Concerns;

use DateTime;

trait LocatableAndModifiable
{
    /**
     * The sitemap location.
     *
     * @var string
     */
    protected $location;

    /**
     * The last modified timestamp.
     *
     * @var \DateTime
     */
    protected $lastModified;

    /**
     * Get the sitemap location.
     *
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * Set the sitemap location.
     *
     * @param  string  $location
     * @return void
     */
    public function setLocation(string $location)
    {
        $this->location = $location;
    }

    /**
     * Get the last modified timestamp.
     *
     * @return \DateTime
     */
    public function getLastModified(): DateTime
    {
        return $this->lastModified;
    }

    /**
     * Set the lastModified timestamp.
     *
     * @param  mixed  $lastModified
     * @return void
     */
    public function setLastModified($lastModified)
    {
        if ( ! $lastModified instanceof DateTime) {
            $lastModified = new DateTime($lastModified);
        }

        $this->lastModified = $lastModified;
    }

    /**
     * Alias to set the last modified timestamp.
     *
     * @param  mixed  $lastModified
     * @return void
     */
    public function modified($lastModified)
    {
        $this->setLastModified($lastModified);
    }
}
