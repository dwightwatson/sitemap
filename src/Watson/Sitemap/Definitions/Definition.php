<?php

namespace Watson\Sitemap\Definitions;

use DateTime;
use Watson\Sitemap\Definitions\Concerns\LocatableAndModifiable;

abstract class Definition
{
    use LocatableAndModifiable;

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
    * The expiration timestamp.
    *
    * @var \DateTime
    */
    protected $expired;

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
     * @param  \Watson\Sitemap\Enums\ChangeFrequency|string  $changeFrequency
     * @return void
     */
    public function setChangeFrequency($changeFrequency)
    {
        $this->changeFrequency = $changeFrequency;
    }

    /**
     * Alias to set the change frequency.
     *
     * @param  \Watson\Sitemap\Enums\ChangeFrequency|string  $changeFrequency
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
     * @param  \Watson\Sitemap\Enums\Priority|string  $priority
     * @return void
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * Alias to set the priority.
     *
     * @param  \Watson\Sitemap\Enums\Priority|string  $priority
     * @return void
     */
    public function priority($priority)
    {
        $this->setPriority($priority);
    }

    /**
     * Get the expired timestamp.
     *
     * @return string
     */
    public function getExpired(): DateTime
    {
        return $this->expired;
    }

    /**
     * Set the expired timestamp.
     *
     * @param  mixed  $expired
     * @return void
     */
    public function setExpired($expired = null)
    {
        if (is_null($expired)) {
            $expired = new DateTime;
        }

        if ( ! $expired instanceof DateTime) {
            $expired = new DateTime($expired);
        }

        $this->expired = $expired;
    }

    /**
     * Alias to set the expired timestamp>
     *
     * @param  mixed  $expired
     * @return void
     */
    public function expired($expired = null)
    {
        $this->setExpired($expired);
    }
}
