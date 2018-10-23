<?php

namespace Watson\Sitemap\Definitions;

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
}
