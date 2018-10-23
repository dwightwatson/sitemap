<?php

namespace Watson\Sitemap\Definitions;

use DateTime;

abstract class Definition
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
     * The change frequency.
     *
     * @var string
     */
    protected $changeFrequency;

    /**
     * The priority.
     *
     * @var string
     */
    protected $priority;

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

    /**
     * Get the change frequency.
     *
     * @return string
     */
    public function getChangeFrequency(): string
    {
        return $this->changeFrequency;
    }

    /**
     * Set the change frequency.
     *
     * @param  \Watson\Sitemap\ChangeFrequency|string  $changeFrequency
     * @return void
     */
    public function setChangeFrequency($changeFrequency)
    {
        $this->changeFrequency = $changeFrequency;
    }

    /**
     * Alias to set the change frequency.
     *
     * @param  \Watson\Sitemap\ChangeFrequency|string  $changeFrequency
     * @return void
     */
    public function changes($changeFrequency)
    {
        $this->setChangeFrequency($changeFrequency);
    }

    /**
     * Get the priority.
     *
     * @return string
     */
    public function getPriority(): string
    {
        return $this->priority;
    }

    /**
     * Set the priority.
     *
     * @param  \Watson\Sitemap\Priority|string  $priority
     * @return void
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Alias to set the priority.
     *
     * @param  \Watson\Sitemap\Priority|string  $priority
     * @return void
     */
    public function priority($priority)
    {
        $this->setPriority($priority);
    }
}
