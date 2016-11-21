<?php namespace Watson\Sitemap\Tags;

class Tag extends BaseTag
{
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
     * @param  string  $lastModified
     * @param  string  $changeFrequency
     * @param  string  $priority
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
     * @return string
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
     * @return string
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Get the multilangual urls if exist.
     *
     * @return array
     */
    public function getMultiLangual()
    {
        return $this->multilang;
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
