<?php

namespace Watson\Sitemap\Tags;

class Tag extends BaseTag
{
    /**
     * The change frequency.
     *
     * @var string|null
     */
    protected $changeFrequency;

    /**
     * The priority.
     *
     * @var string|null
     */
    protected $priority;

    /**
     * Map the sitemap XML tags to class properties.
     *
     * @var array
     */
    protected $xmlTags = [
        'loc'        => 'location',
        'lastmod'    => 'lastModified',
        'changefreq' => 'changeFrequency',
        'priority'   => 'priority'
    ];

    /**
     * Construct the tag.
     *
     * @param  string  $location
     * @param  \DateTimeInterface|string|null  $lastModified
     * @param  string|null  $changeFrequency
     * @param  string|null  $priority
     * @return void
     */
    public function __construct($location, $lastModified = null, $changeFrequency = null, $priority = null)
    {
        parent::__construct($location, $lastModified);

        $this->changeFrequency = $changeFrequency;
        $this->priority = $priority;
    }

    /**
     * Get the change frequency.
     *
     * @return string|null
     */
    public function getChangeFrequency()
    {
        return $this->changeFrequency;
    }

    /**
     * Set the change frequency.
     *
     * @param  \Watson\Sitemap\Tags\ChangeFrequency|string  $changeFrequency
     * @return void
     */
    public function setChangeFrequency($changeFrequency)
    {
        $this->changeFrequency = $changeFrequency;
    }

    /**
     * Get the priority.
     *
     * @return string|null
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set the priority.
     *
     * @param  string  $priority
     * @return void
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }
}
